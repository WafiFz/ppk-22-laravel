<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class SampahController extends Controller
{
    public function create(Request $request)
    {
        $input = $request->all();
        $input['id'] = Uuid::uuid4()->getHex();
        $input['user_id'] = Auth::user()->id;

        $sampah = Sampah::create($input);
        return response()->json(
            [
                'message' => 'Data has been inserted successfully',
                'data' => $sampah,
                'info user' => $sampah->user,
            ]
        );
    }

    public function view()
    {
        $sampah = Sampah::all();

        return response()->json(
            [
                'message' => 'Success',
                'data' => $sampah,
            ]
        );
    }

    public function viewByID($id)
    {
        $sampah = Sampah::find($id);

        return response()->json(
            [
                'data' => $sampah,
            ]
        );
    }

    public function updateByID(Request $request, $id)
    {
        $input = $request->all();
        $sampah = Sampah::find($id);

        if (!$sampah) {
            abort(404);
        }

        $sampah->fill($input);
        $sampah->save();

        return response()->json(
            [
                'data'  => $sampah,
            ]
        );
    }

    public function deleteByID($id)
    {
        $sampah = Sampah::find($id);

        if (!$sampah) {
            abort(404);
        }

        $sampah->delete();

        return response()->json(
            [
                'message' => 'Delete Successfully',
                'id_sampah' => $id,
            ]
        );
    }
}
