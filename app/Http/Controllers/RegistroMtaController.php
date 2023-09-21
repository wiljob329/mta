<?php

namespace App\Http\Controllers;

use App\Models\Accion;
use App\Models\Mesa_Tecnica;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class RegistroMtaController extends Controller
{
    public function registroMta(Request $request) {

        // Validacion de los datos del formulario de registro de mta
        $request->validate([
            'nombre_mta' => ['required', 'min:6', Rule::unique('mesa_tecnicas', 'nombre_mta')],
            'correo_encargado' => ['required', 'email', Rule::unique('mesa_tecnicas', 'correo_encargado')],
            'telefono_encargado' => ['required', 'digits_between:5, 11'],
            'doc_constitucion_mta' => ['required', File::types('pdf')->max(2 * 1024)],
            'doc_constancia_cc' => ['required', File::types('pdf')->max(2 * 1024)],
            'doc_rif_mta' => ['required', File::types('pdf')->max(2 * 1024)]
        ]);


        // Guardando los datos de la mta y creando su id
        Mesa_Tecnica::create([
            'nombre_mta' => $request['nombre_mta'],
            'correo_encargado' => $request['correo_encargado'],
            'telefono_encargado' => $request['telefono_encargado']
        ]);

        // consulta a la db de la mta para utilizar su id y nombre en los archivos
        $mta_id = Mesa_Tecnica::where('nombre_mta', $request['nombre_mta'])->first();

        // renombrado y guardado de archivos
        // archivo de constitucion de mta
        $file_doc_constitucion_mta = $mta_id->id.'-doc_constitucion_mta.'.$request->doc_constitucion_mta->extension();
        $request->doc_constitucion_mta->move(public_path('Mesas Tecnicas/'.$mta_id->nombre_mta), $file_doc_constitucion_mta);

        // archivo de constancia del consejo comunal
        $file_doc_constancia_cc = $mta_id->id.'-doc_constancia_cc.'.$request->doc_constancia_cc->extension();
        $request->doc_constancia_cc->move(public_path('Mesas Tecnicas/'.$mta_id->nombre_mta), $file_doc_constancia_cc);
            
        // archivo del rif de la mta
        $file_doc_rif_mta = $mta_id->id.'-doc_rif_mta.'.$request->doc_rif_mta->extension();
        $request->doc_rif_mta->move(public_path('Mesas Tecnicas/'.$mta_id->nombre_mta), $file_doc_rif_mta);

        //guardado en tabla accions de la relacion entre usuario y mta
        Accion::create([
           'mesa_tecnica_id' => $mta_id->id,
           'registro_usuario_id' => auth()->user()->id,
           'accion' => 1
        ]);
        
        $solicitud = Solicitud::where('registro_usuario_id', auth()->user()->id)->first();
        
        if ($solicitud) {
            $solicitud->delete();
        }        
        return redirect()->route('home')->with('success', 'Se registro con exito la mesa tecnica');
    }
}
