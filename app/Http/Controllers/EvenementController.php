<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{

    public function index()
    {
        return Evenement::all();
    }


    public function store(Request $request)
    {

        $evenement = Evenement::create($request->all());

        return response()->json($evenement, 201);    }


    public function show(Evenement $evenement,string $identifier)
        {
            $evenement = Evenement::where('id_event', $identifier)->first();
            if (!$evenement) {
                return response()->json(['error' => 'User not found'], 404);
            }
            else{
        
            return response()->json($evenement);
            }    }



    public function update(Request $request, Evenement $evenement,string $identifier)
    {
        $evenement = Evenement::where('id_event', $identifier)->first();

        // Check if the user exists
        if (!$evenement) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // Update specific attributes
        if ($request->has('nom')) {
            $evenement->nom = $request->input('nom');
        }
    
        if ($request->has('description')) {
            $evenement->description = $request->input('description');
        }

        if ($request->has('ville')) {
            $evenement->ville = $request->input('ville');
    
        }
        if ($request->has('affiche')) {
            $evenement->affiche = $request->input('affiche');
    
        }

        if ($request->has('date')) {
            $evenement->date = $request->input('date');
    
        }

        if ($request->has('id_rating')) {
            $evenement->id_rating = $request->input('id_rating');
    
        }

        if ($request->has('id_type')) {
            $evenement->id_type = $request->input('id_type');
    
        }
    
        // Update other attributes similarly
    
        // Save the changes
        $evenement->save();
    
        // Return the updated user
        return response()->json($evenement);     }


        public function destroy(Evenement $evenement,string $identifier)
        {
            $evenement = Evenement::where('id_event', $identifier)->first();
    
            $evenement->delete();
    
        return response()->json(null, 204);
        }


}
