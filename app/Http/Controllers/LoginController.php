<?php

use App\Models\DatiAnagrafici;
use Illuminate\Routing\Controller;
use App\Models\Dipendente;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {

    public function login() {
        if(session('user_email') != null) {
            return redirect("portale_dipendenti");
        }
        else {
            return view('login_signup')
            ->with('csrf_token', csrf_token());
        }
     }

    public function checkLogin() {

        switch(request("tipo")){
            case 'login':
                $dipendente = Dipendente::where('email', request('email1'))->first();
                if($dipendente !== null) {
                    if(password_verify(request('password1'),$dipendente->password)){
                        Session::put('user_email', $dipendente->email);
                        return redirect('portale_dipendenti');
                    }
                }
                else {
                    return view('login_signup')->with('csrf_token', csrf_token());
                }
                break;
            case 'signup':
                if (!empty(request('password')) && !empty(request('email')) && !empty(request('codice_fiscale')) && 
                !empty(request('confirm_password'))){
                    $error = array();
                    # CODICE FISCALE
                    // Controlla che il cf rispetti il pattern specificato
                    if(!preg_match('/^[a-zA-Z0-9]{1,16}$/', $_POST['codice_fiscale'])) {
                        $error[] = "Codice fiscale non valido";
                    } 
                    else {
                        // Cerco se il codice fiscale è presente nel DB
                        $query = DatiAnagrafici::where('cf',request('codice_fiscale'))->first();
                        if ($query=='') {
                            $error[] = "Codice fiscale non presente, contattare la sezione informatica";
                        }
                    }
                    # PASSWORD
                    if (strlen(request('password')) < 8) {
                        $error[] = "Caratteri password insufficienti";
                    } 
                    # CONFERMA PASSWORD
                    if (strcmp(request('password'), request('confirm_password')) != 0) {
                        $error[] = "Le password non coincidono";
                    }
                    # EMAIL
                    if (!filter_var(request('email'), FILTER_VALIDATE_EMAIL)) {
                        $error[] = "Email non valida";
                    } 
                    else {
                        $email = Dipendente::where('email', request('email'))->first();
                        if ($email!='') {
                            $error[] = "Email già utilizzata";
                        }
                    }
                    # REGISTRAZIONE NEL DATABASE
                    if (count($error) == 0) {
                        $id_dipendente=DatiAnagrafici::where('cf',request('codice_fiscale'))->first()->dipendente;
                        $query = Dipendente::find($id_dipendente);

                        $query->email = request('email');
                        $query->password= password_hash(request('password'), PASSWORD_BCRYPT);
                        $res=$query->save();
                        if ($res) {
                            Session::put('user_email', request('email'));
                            return redirect("portale_dipendenti");
                        } 
                        else {
                            $error[] = "Errore di connessione al Database";
                        }
                    }
                }
                else if (!empty(request('email'))){
                    $error = array("Riempi tutti i campi");
                    return view('login_signup')->with('csrf_token', csrf_token());
                }
                break;    
        }
    }

    public function logout() {
        Session::flush();
        return redirect('login_signup');
    }

    public function checkCf($q){
        $query = DatiAnagrafici::where('cf',$q)->first();
        return array('exists' => $query!='' ? true : false);
    }

    public function checkEmail($q){
        $query = Dipendente::where('email', $q)->first();
        return array('exists' => $query!='' ? true : false);
    }

}
?>