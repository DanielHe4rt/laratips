<?php


namespace App\Http\Controllers;


use App\Http\Requests\OAuthRequest;
use App\Models\User;
use App\Services\GithubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    /**
     * @var GithubService
     */
    private GithubService $service;

    public function __construct(GithubService $service)
    {
        $this->service = $service;
    }

    public function authenticate(OAuthRequest $request)
    {
        $result = $this->service->auth($request->input('code'));
        $token = $result['access_token'];
        $userData = $this->service->getAuthenticatedUser($token);
        $user = $this->handleUser($userData);

        Auth::login($user);
        return redirect('/' . $user->name);

    }

    public function handleUser(array $user): User
    {
        $model = User::where('github_id', $user['github_id'])->first();
        if (!$model) {
            $user['id'] = Uuid::uuid4()->toString();
            return User::create($user);
        }
        return $model;
    }

    public function logout() {

        Auth::guard()->logout();
        return redirect('/');
    }
}
