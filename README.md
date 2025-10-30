php artisan migrate --seed


Generate Sanctum API token:
php artisan tinker
>>> $user = App\Models\User::firstOrCreate(['email' => 'admin@example.com'], [
...     'name' => 'Admin',
...     'password' => bcrypt('admin123')
... ]);
>>> $token = $user->createToken('admin-token')->plainTextToken;

php artisan reverb:start


php artisan serve

Access API:
GET http://localhost:8000/api/polls
POST http://localhost:8000/api/polls/1/vote
Headers: Authorization: Bearer YOUR_TOKEN
Body: { "option_id": 2 }