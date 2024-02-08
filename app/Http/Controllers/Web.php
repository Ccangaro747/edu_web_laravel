<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str as Str;

class Web extends Controller
{
    public function iniciarSesion(Request $request)
    {

        $usuario = $request->input('usuario');
        $clave   = $request->input('clave');



        // Verifico si existe el mail y password como usuario
        $usuarios = DB::table('Usuarios')
            ->where('Email', '=', $usuario)
            ->where('Password', '=', $clave)
            ->get();

        if (count($usuarios)) {
            $user = $usuarios->first();
            $perfiles = DB::table('Usuarios_perfiles')
                ->where('IdUsuario', '=', $user->Id)
                ->get();
            if (count($perfiles)) {
                if (count($perfiles) == 1) {
                    $perfil = $perfiles->first()->Perfil;
                    $usuarioSession = ['id' => $user->Id, 'nombre' => $user->Nombre, 'dni' => $user->DNI, 'idperfil' => $perfiles->first()->Id, 'perfil' => $perfil];
                    $request->session()->put('userAct', $usuarioSession);
                    $nombre = Str::slug(session()->get('userAct.nombre'));
                    return redirect('inicio/' . $nombre . '/' . $perfiles->first()->Id);
                }

                return view('index', $perfiles);
            } else {
                return redirect('login')->with('error', 'au');
            }
        } else {
            return redirect('login')->with('error', 'au');
        }
    }

    public function cerrarSesion(Request $request)
    {

        $request->session()->forget('userAct');

        return redirect('login');
    }

    public function index(Request $request, $nombre, $idperfil)
    {
        // Obtén el usuario autenticado
        $user = $request->user();

        return view('inicio', ['user' => $user]);
    }

    public function mostrarMateria(Request $request, $materia, $idmateria)
    {
        $notificaciones = DB::table('tipo_mensaje as t')
            ->leftJoin(DB::raw('(SELECT Tipo, COUNT(Tipo) as contador FROM v_notificaciones
         WHERE idmateria = ' . $idmateria . ' AND IdReceptor = ' . session()->get('userAct.idperfil') .
                ' GROUP BY Tipo) v'), 'v.Tipo', '=', 't.id')
            ->select('t.id', 't.nombre', 'v.contador as cantidad', 't.icono', 't.color')
            ->groupBy('t.id', 't.nombre', 'v.contador', 't.icono', 't.color')
            ->get();

        return view('components.alumnos.vermateria', compact('notificaciones', 'materia', 'idmateria'));
    }

    public function notificacionesmateria(Request $request, $idmateria, $tipo)
    {
        $notificaciones = DB::table('v_notificaciones')
            ->select('*')
            ->where('idmateria', '=', $idmateria)
            ->where('Tipo', '=', $tipo)
            ->where('IdReceptor', '=', session()->get('userAct.idperfil'))
            ->get();


        return view('components.alumnos.notificaciones', compact('notificaciones'));
    }

    public function notificaciones_todas(Request $request)
    {
        $notificaciones = DB::table('v_notificaciones')
            ->select('*')
            ->where('IdReceptor', '=', session()->get('userAct.idperfil'))
            ->get();


        return view('components.notificaciones_todas', compact('notificaciones'));
    }

    public function notificacionespadrestipo(Request $request, $tipo)
    {
        $notificaciones = DB::table('v_notificaciones')
            ->select('*')
            ->where('Tipo', '=', $tipo)
            ->where('IdReceptor', '=', session()->get('userAct.idperfil'))
            ->get();


        return view('components.padres.notificacionestipo', compact('notificaciones'));
    }

    public function notificacionesdocentestipo(Request $request, $tipo)
    {
        $notificaciones = DB::table('v_notificaciones')
            ->select('*')
            ->where('Tipo', '=', $tipo)
            ->where('IdReceptor', '=', session()->get('userAct.idperfil'))
            ->get();


        return view('components.docentes.notificacionestipo', compact('notificaciones'));
    }

    public function notificacionesdirectivostipo(Request $request, $tipo)
    {
        $notificaciones = DB::table('v_notificaciones')
            ->select('*')
            ->where('Tipo', '=', $tipo)
            ->where('IdReceptor', '=', session()->get('userAct.idperfil'))
            ->get();

        return view('components.alumnos.vermateria', compact('notificaciones','materia', 'idmateria'));
    }
    
    }
    
    


