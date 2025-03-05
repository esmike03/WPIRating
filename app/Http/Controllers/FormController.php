<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Personnel;
use Illuminate\Http\Request;
use App\Mail\CustomerFormMail;
use App\Mail\PersonnelFormMail;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'area_code' => 'required|string|max:255',
            'agent_name' => 'required|string|max:255',
            'partner_name' => 'required|string|max:255',
            'supervisor_name' => 'required|string|max:255',
            'manager_name' => 'required|string|max:255',
            'personalrelation' => 'required|array',
            'grooming' => 'required|array',
            'stocks' => 'required|array',
            'expenses' => 'required|array',
            'comments' => 'nullable|string|max:255',
        ]);

        // Merge all rating-related arrays
        $allRatings = array_merge(
            $validatedData['personalrelation'],
            $validatedData['grooming'],
            $validatedData['stocks'],
            $validatedData['expenses']
        );

        // Calculate the average rating
        $totalScore = array_sum($allRatings);
        $totalItems = count($allRatings);
        $averageRating = $totalItems > 0 ? $totalScore / $totalItems : 0;

        // Save to database
        Personnel::create([
            'date' => $validatedData['date'],
            'area_code' => $validatedData['area_code'],
            'agent_name' => $validatedData['agent_name'],
            'partner_name' => $validatedData['partner_name'],
            'supervisor_name' => $validatedData['supervisor_name'],
            'manager_name' => $validatedData['manager_name'],
            'personalrelation' => json_encode($validatedData['personalrelation']),
            'grooming' => json_encode($validatedData['grooming']),
            'stocks' => json_encode($validatedData['stocks']),
            'expenses' => json_encode($validatedData['expenses']),
            'comments' => json_encode($validatedData['comments']),
            'average_rating' => round($averageRating, 2),
        ]);

        // Prepare email data
        $data = [
            'date' => $validatedData['date'],
            'area_code' => $validatedData['area_code'],
            'agent_name' => $validatedData['agent_name'],
            'partner_name' => $validatedData['partner_name'],
            'supervisor_name' => $validatedData['supervisor_name'],
            'manager_name' => $validatedData['manager_name'],
            'personalrelation' => json_encode($validatedData['personalrelation']),
            'grooming' => json_encode($validatedData['grooming']),
            'stocks' => json_encode($validatedData['stocks']),
            'expenses' => json_encode($validatedData['expenses']),
            'comments' => json_encode($validatedData['comments']),
            'average_rating' => round($averageRating, 2),
        ];
        // Send email
        Mail::to("sarabiaearlmike14@gmail.com")->send(new PersonnelFormMail($data));

        return response()->json(['success' => true]);
    }

    public function store2(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'customer_code' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'personalrelation' => 'required|array',
            'sales' => 'required|array',
            'comments' => 'nullable|string|max:255',
        ]);

        $allRatings = array_merge(
            $validatedData['personalrelation'],
            $validatedData['sales'],
        );

        // Calculate the average rating
        $totalScore = array_sum($allRatings);
        $totalItems = count($allRatings);
        $averageRating = $totalItems > 0 ? $totalScore / $totalItems : 0;

        // Save to database
        Customer::create([
            'date' => $validatedData['date'],
            'customer_code' => $validatedData['customer_code'],
            'customer_name' => $validatedData['customer_name'],
            'address' => $validatedData['address'],
            'personalrelation' => json_encode($validatedData['personalrelation']),
            'sales' => json_encode($validatedData['sales']),
            'comments' => $validatedData['comments'],
            'average_rating' => round($averageRating, 2),
        ]);

        $data = [
            'date' => $validatedData['date'],
            'customer_code' => $validatedData['customer_code'],
            'customer_name' => $validatedData['customer_name'],
            'address' => $validatedData['address'],
            'personalrelation' => json_encode($validatedData['personalrelation']),
            'sales' => json_encode($validatedData['sales']),
            'comments' => $validatedData['comments'],
            'average_rating' => round($averageRating, 2),
        ];
        // Send email
        Mail::to("sarabiaearlmike14@gmail.com")->send(new CustomerFormMail($data));

        return response()->json(['success' => true]);
    }
}
