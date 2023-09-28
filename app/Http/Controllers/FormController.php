<?php
//
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

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
    
        // // Store data in the "students" table
        // $student = new Student();
        // $student->name = $request->name;
        // $student->email = $request->email;
        // $student->phone = $request->phone;
        // $student->image = $request->image->getClientOriginalName();
        // $student->rating = $request->rating;
        // $student->save();
    
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
        
        // Retrieve the student data from the database
        //$student = Student::where('email', $results['email'])->first();
        
        return view('result', ['results' => $results]);
    }

//     public function admin()
//     {
//         $students = Student::all();
//         return view('admin', ['students' => $students]);
//     }

//     public function edit($id)
//     {
//         $student = Student::find($id);
//         return view('edit', ['student' => $student]);
//     }

//     public function delete($id)
//     {
//         $student = Student::find($id);
//         if ($student) {
//             $student->delete();
//             return redirect('/admin')->with('success', 'Data berhasil dihapus.');
//         }
//         return redirect('/admin')->with('error', 'Data tidak ditemukan.');
//     } 
    
//     public function update(Request $request, $id)
// {
//     $data = $request->validate([
//         'nama' => 'required',
//         'email' => 'required|email:rfc',
//         'nilairapot' => 'required|numeric|between:2.50,99.99',
//         'nomor_telepon' => 'required|numeric',
//         // Add validation rules for other fields if needed
//     ]);

//     $student = Student::find($id);

//     if (!$student) {
//         return redirect('/admin')->with('error', 'Data tidak ditemukan.');
//     }

//     $student->update([
//         'nama' => $request->nama,
//         'email' => $request->email,
//         'nilairapot' => $request->nilairapot,
//         'nomor_telepon' => $request->nomor_telepon,
//         // Update other fields here
//     ]);

//     return redirect('/admin')->with('status', 'Data telah diperbarui.');
// }


}
