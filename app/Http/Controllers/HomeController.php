<?php

namespace App\Http\Controllers;
use App\Http\Controllers\APIResponseTrait;
use App\Models\{City,Category,Configration , Complaint , Question};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use APIResponseTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function showCities()
    {
        $data = City::all();
        return $this->APIResponse($data, null, 200);
    }
    public function showCategories()
    {
        $data = Category::all();
        return $this->APIResponse($data, null, 200);
    }
    public function configration()
    {
        $data = Configration::all();
        return $this->APIResponse($data, null, 200);
    }
    public function showQuestions()
    {
        $data = Question::all();
        return $this->APIResponse($data, null, 200);
    }
    public function addComplaint(Request $request)
    {
        if($request->complaint == null || $request->complaint == " ")
        {
            return $this->APIResponse(null, 'complaint is required', 400);
        }
        Complaint::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'complaint' => $request->complaint
        ]);
        return $this->APIResponse(null, null, 200);
    }
    public function conditions()
    {
        $configration = Configration::find(1);
        return view('condition' , compact('configration'));
    }
}
