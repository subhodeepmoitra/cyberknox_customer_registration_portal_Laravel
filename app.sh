echo "Starting Laravel application"
php artisan serve &

echo "Starting npm development"
npm run dev

echo "Killing the process in port 8080"
sudo kill $(sudo lsof -t -i:8000)
