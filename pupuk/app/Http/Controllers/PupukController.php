<?php

namespace App\Http\Controllers;

use App\Models\Pupuk;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;
use Ramsey\Uuid\Uuid;

class PupukController extends Controller
{
    public function create(Request $request)
    {
        $input  = $request->all();
        $input['id'] = Uuid::uuid4()->getHex();

        $pupuk = Pupuk::create($input);
        return response()->json(
            [
                'message' => 'Data has been inserted successfully',
                'data' => $pupuk
            ]
        );
    }

    public function view()
    {
        $pupuk = Pupuk::all();
        return response()->json(
            [
                'message' => 'Success',
                'data' => $pupuk,
            ]
        );
    }

    public function viewByID($id)
    {
        // $id = $request->id;
        $pupuk = Pupuk::find($id);

        return response()->json(
            [
                'data' => $pupuk,
            ]
        );
    }

    public function updateByID(Request $request, $id)
    {
        $input = $request->all();
        $pupuk = Pupuk::find($id);

        if (!$pupuk) {
            abort(404);
        }

        $pupuk->fill($input);
        $pupuk->save();

        return response()->json(
            [
                'data' => $pupuk,
            ]
        );
    }

    public function deleteByID($id)
    {
        $pupuk = Pupuk::find($id);

        if (!$pupuk) {
            abort(404);
        }

        $pupuk->delete();

        return response()->json(
            [
                'message' => 'Delete Successfully',
                'id_pupuk' => $id
            ]
        );
    }
}
