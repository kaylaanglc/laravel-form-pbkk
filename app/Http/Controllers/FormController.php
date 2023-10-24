<?php
//
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\Reviewer; // Import the Reviewer model


class FormController extends Controller
{
    public function formulir(){
        return view('form');
    }

    public function show(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc',
            'phone' => 'required|numeric',
            'product' => 'required',
            'image' => 'required|max:2048|mimes:jpg,jpeg,png',
            'rating' => 'required|numeric|between:2.50,99.99',
        ]);

        // Store data in the "reviewers" table
        $reviewer = new Reviewer();
        $reviewer->name = $request->name;
        $reviewer->email = $request->email;
        $reviewer->phone = $request->phone;
        $reviewer->product = $request->product;
        $reviewer->image = $request->image->getClientOriginalName();
        $reviewer->rating = $request->rating;
        $reviewer->save();

        // Store the results in the session
        $results = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'product' => $request->product,
            'image' => $request->image->getClientOriginalName(),
            'rating' => $request->rating,
        ];
        return redirect('/result')->with(['results' => $results, 'status' => 'Submitted!']);
    }

    public function result(){
        $results = session()->get('results');

        // Retrieve the reviewer data from the database
        $reviewer = Reviewer::where('email', $results['email'])->first();

        return view('result', ['results' => $results]);
    }

    public function admin()
    {
        $reviewers = Reviewer::all();
        return view('admin', ['reviewers' => $reviewers]);
    }

    public function edit($id)
    {
        $reviewer = Reviewer::find($id);
        return view('edit', ['reviewer' => $reviewer]);
    }

    public function delete($id)
    {
        $reviewer = Reviewer::find($id);
        if ($reviewer) {
            $reviewer->delete();
            return redirect('/admin')->with('success', 'Data berhasil dihapus.');
        }
        return redirect('/admin')->with('error', 'Data tidak ditemukan.');
    }

    public function update(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required',
        'phone' => 'required|numeric',
        'product' => 'required',
        'rating' => 'required|numeric|between:2.50,99.99',
        // Add validation rules for other fields if needed
    ]);

    $reviewer = Reviewer::find($id);

    if (!$reviewer) {
        return redirect('/admin')->with('error', 'Data tidak ditemukan.');
    }

    $reviewer->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'product' => $request->product,
        'rating' => $request->rating,
        // Update other fields here
    ]);

    return redirect('/admin')->with('status', 'Data telah diperbarui.');
}


}
