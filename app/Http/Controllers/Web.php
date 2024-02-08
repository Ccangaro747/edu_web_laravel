<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

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
        $perfil = session()->get('userAct.perfil');
        switch ($perfil) {
            case 4: //Alumno                            
                $materias = DB::table('v_cursos_alumnos')
                    ->where('IdUsuario', '=', $idperfil)
                    ->get();
                return view('components.alumnos.index', compact('materias'));

            case 3: //Padre
                $notificaciones = DB::table('tipo_mensaje as t')
                    ->leftJoin(DB::raw('(SELECT Tipo, COUNT(Tipo) as contador FROM v_notificaciones
                     WHERE IdReceptor = ' . $idperfil .
                        ' GROUP BY Tipo) v'), 'v.Tipo', '=', 't.id')
                    ->select('t.id', 't.nombre', 'v.contador as cantidad', 't.icono', 't.color')
                    ->groupBy('t.id', 't.nombre', 'v.contador', 't.icono', 't.color')
                    ->get();
                $hijo = DB::table('v_usuarios_perfiles')
                    ->select('alumno', 'curso')
                    ->where('id', '=', $idperfil)
                    ->get()->first();
                return view('components.padres.index', compact('notificaciones', 'hijo'));

            case 2: //Docente
                $notificaciones = DB::table('tipo_mensaje as t')
                    ->leftJoin(DB::raw('(SELECT Tipo, COUNT(Tipo) as contador FROM v_notificaciones
                     WHERE IdReceptor = ' . $idperfil .
                        ' GROUP BY Tipo) v'), 'v.Tipo', '=', 't.id')
                    ->select('t.id', 't.nombre', 'v.contador as cantidad', 't.icono', 't.color')
                    ->groupBy('t.id', 't.nombre', 'v.contador', 't.icono', 't.color')
                    ->get();
                $materia = DB::table('v_usuarios_perfiles')
                    ->select('materia', 'curso')
                    ->where('id', '=', $idperfil)
                    ->get()->first();
                return view('components.docentes.index', compact('notificaciones', 'materia'));

            case 1: //Directivo
                $notificaciones = DB::table('tipo_mensaje as t')
                    ->leftJoin(DB::raw('(SELECT Tipo, COUNT(Tipo) as contador FROM v_notificaciones
                            WHERE IdReceptor = ' . $idperfil . ' GROUP BY Tipo) v'), 'v.Tipo', '=', 't.id')
                    ->select('t.id', 't.nombre', 'v.contador as cantidad', 't.icono', 't.color')
                    ->groupBy('t.id', 't.nombre', 'v.contador', 't.icono', 't.color')
                    ->get();
                $escuela = DB::table('v_usuarios_perfiles')
                    ->select('escuela')
                    ->where('id', '=', $idperfil)
                    ->get()
                    ->first();
                return view('components.directivos.index', compact('notificaciones', 'escuela'));

        }
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


        return view('components.directivos.notificacionestipo', compact('notificaciones'));
    }

    public function vermensajecompleto(Request $request, $id)
    {
        DB::table('Notificaciones')->where('Id', $id)->Update(['Leida' => true]);
        $not = DB::table('v_notificaciones')
            ->select('*')
            ->where('Id', '=', $id)
            ->get()->first();
        $texto = '    
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h4 class="modal-title titulos"><small>Notificación #' . $not->Id . '.</small> ' . $not->Motivo . '</h4>
        </div>
        <div class="modal-body">
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item w-50"><p>Escuela:</p></li>              
              <li class="list-group-item w-100"><p><b>' . $not->Escuela . '</b></p></li>
            </ul>
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item w-50"><p>Curso:</p></li>
              <li class="list-group-item w-100"><p><b>' . $not->curso . '</b></p></li>
            </ul>
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item w-50"><p>Materia:</p></li>
              <li class="list-group-item w-100"><p><b>' . $not->Materia . '</b></p></li>
            </ul>
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item w-50"><p>Emisor:</p></li>
              <li class="list-group-item w-100"><p><b>' . $not->nombre_emisor . '</b></p></li>
            </ul>
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item w-50"><p>Destinatario:</p></li>
              <li class="list-group-item w-100"><p><b>' . $not->nombre_receptor . '</b></p></li>
            </ul>
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item w-50"><p><i class="fas fa-calendar" aria-hidden="true"></i></p></li>
              <li class="list-group-item w-100"><p><b>' . $not->Fecha . '</b></li>
            </ul> 
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item w-50"><i class="fa fa-clock-o" aria-hidden="true"></i></p></li>
              <li class="list-group-item w-100"><p><b>' . $not->Hora . '</b></p></li>
            </ul>
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item w-50"><p>Tipo de Mensaje:</p></li>
              <li class="list-group-item w-100"><p><b>' . $not->nombretipo . '</b></p></li>
            </ul>
            <p class="titulos">Texto completo del mensaje:</p>
            <textarea rows="5" class="form-control" readonly style="font-size: 12px;">' . $not->Texto . '</textarea>';
        if (!is_null($not->Link)) {
            $texto .=
                '<ul class="list-group list-group-horizontal">
                <li class="list-group-item w-50"><p><b>Este mensaje tiene un enlace:</b></li>
                <li class="list-group-item w-100"> <a href="' . url($not->Link) . '" target="_blank" role="button" class="btn btn-info btn-sm">Ir al link</a></p></li>
            </ul>';
        }
        if (!is_null($not->Adjunto)) {
            $texto .=
                '<ul class="list-group list-group-horizontal">
                <li class="list-group-item w-50"><p><b>Este mensaje tiene un documento adjunto:</b></li>
              <li class="list-group-item w-100"> <a href="' . url($not->Adjunto) . '" target="_blank" role="button" class="btn btn-success btn-sm">Descargar</a></p></li>
            </ul>';
        }
        $texto .=
            '</div>
        <div class="modal-footer gap-2">';
        if ($not->Permite_Rta) {
            if (!$not->Respondido) {
                if ($not->perfilReceptor != 4) {
                    $texto .= '<a role="button" class="btn btn-primary" href="' .
                        url('responder/' . $not->Id) . '">Responder</a>';
                }
            } else {
                $texto .= '<span class="badge bg-success"><h6>Ya respondido!!</h6></span>&nbsp;&nbsp;&nbsp;';
            }
        }
        $texto .=    '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>';


        return $texto;
    }

    public function respondermensaje(Request $request, $id)
    {
        $not = DB::table('v_notificaciones')
            ->select('*')
            ->where('Id', '=', $id)
            ->get()->first();
        return view('components.responder', compact('not'));
    }

    public function guardarRespuesta(Request $request)
    {

        $idRespuesta = DB::table('Notificaciones')
            ->insertGetId([
                'IdEmisor' => $request->input('IdEmisor'),
                'IdReceptor' => $request->input('IdReceptor'),
                'Texto' => $request->input('Texto'),
                'Tipo' => $request->input('Tipo'),
                'Motivo' => $request->input('Motivo'),
                'Fecha' => DB::raw('CURDATE()'),
                'Hora' => DB::raw('CURTIME()'),
                'Leida' => false,
                'Respondido' => false,
                'Permite_Rta' => false,
                'Link' => null,
                'Adjunto' => null
            ]);
        DB::table('Notificaciones')
            ->where('Id', $request->input('IdOriginal'))
            ->update([
                'Respondido' => true,
                'IdRespuesta' => $idRespuesta
            ]);


        return redirect('notificaciones_todas');
    }
}
