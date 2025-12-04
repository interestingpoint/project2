#!/bin/bash

# Simple Laravel Student API Setup Script
SOURCE_DIR="employee-api"
TARGET_DIR="my-apis"
MYSQL_PASSWORD=123456
DB_NAME="laravel_app"
DB_USER="laravel_user"
DB_PASSWORD="password123"

set -e

if [ -z "$MYSQL_PASSWORD" ]; then
    echo "Creating database..."
    read -s -p "Enter MySQL root password: " MYSQL_PASSWORD
    echo
fi


echo "Creating MySQL user for Laravel..."

# Create database and user
if [[ "$OSTYPE" == "darwin"* ]]; then
  MYSQL="mysql"
else
  MYSQL="sudo mysql"
fi

$MYSQL -u root -p$MYSQL_PASSWORD << EOF
CREATE DATABASE IF NOT EXISTS $DB_NAME;
CREATE USER IF NOT EXISTS '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';
FLUSH PRIVILEGES;
EOF

echo "Creating Laravel project..."
composer create-project laravel/laravel $TARGET_DIR
cd $TARGET_DIR

echo "Updating .env file..."
# Cross-platform sed compatibility  
if [[ "$OSTYPE" == "darwin"* ]]; then
    sed -i '' 's/DB_CONNECTION=sqlite/DB_CONNECTION=mysql/' .env
    sed -i '' "s/# DB_DATABASE=laravel/DB_DATABASE=$DB_NAME/" .env
    sed -i '' "s/# DB_PASSWORD=/DB_PASSWORD=$DB_PASSWORD/" .env
    sed -i '' 's/# DB_HOST=127.0.0.1/DB_HOST=127.0.0.1/' .env
    sed -i '' 's/# DB_PORT=3306/DB_PORT=3306/' .env
    sed -i '' "s/# DB_USERNAME=root/DB_USERNAME=$DB_USER/" .env
    sed -i '' 's/SESSION_DRIVER=database/SESSION_DRIVER=file/' .env
    sed -i '' 's/CACHE_DRIVER=database/CACHE_DRIVER=file/' .env
else
    sed -i 's/DB_CONNECTION=sqlite/DB_CONNECTION=mysql/' .env
    sed -i "s/# DB_DATABASE=laravel/DB_DATABASE=$DB_NAME/" .env
    sed -i "s/# DB_PASSWORD=/DB_PASSWORD=$DB_PASSWORD/" .env
    sed -i 's/# DB_HOST=127.0.0.1/DB_HOST=127.0.0.1/' .env
    sed -i 's/# DB_PORT=3306/DB_PORT=3306/' .env
    sed -i "s/# DB_USERNAME=root/DB_USERNAME=$DB_USER/" .env
    sed -i 's/SESSION_DRIVER=database/SESSION_DRIVER=file/' .env
    sed -i 's/CACHE_DRIVER=database/CACHE_DRIVER=file/' .env 
fi

CONTROLLER_DIR=app/Http/Controllers
mkdir -p $CONTROLLER_DIR/Api

echo "Generating controllers and models..."
php artisan make:controller AnnouncementController --api
php artisan make:controller ArtController --api
php artisan make:controller AudioController --api
php artisan make:controller CalenderController --api
php artisan make:controller CandidateController --api
php artisan make:controller DeviController --api
php artisan make:controller EmployeeController --api
php artisan make:controller GradesController --api
php artisan make:controller HomeworkController --api
php artisan make:controller TickerController --api

php artisan make:controller Api/AnnouncementController --api
php artisan make:controller Api/ArtController --api
php artisan make:controller Api/AudioController --api
php artisan make:controller Api/CalenderController --api
php artisan make:controller Api/CandidateController --api
php artisan make:controller Api/DeviController --api
php artisan make:controller Api/EmployeeController --api
php artisan make:controller Api/GradesController --api
php artisan make:controller Api/HomeworkController --api
php artisan make:controller Api/TickerController --api

php artisan make:model Announcement 
php artisan make:model Art 
php artisan make:model Audio 
php artisan make:model Calender 
php artisan make:model Candidate 
php artisan make:model Devi 
php artisan make:model Grades 
php artisan make:model Homework 
php artisan make:model Employee 
php artisan make:model Ticker 

echo "Copying Controllers..."
SRC_PATH=$CONTROLLER_DIR/Api/AnnouncementController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/Api/ArtController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/Api/AudioController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/Api/CalenderController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/Api/CandidateController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/Api/DeviController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/Api/EmployeeController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/Api/GradesController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/Api/HomeworkController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/Api/TickerController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH

SRC_PATH=$CONTROLLER_DIR/AnnouncementController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/ArtController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/AudioController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/CalenderController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/CandidateController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/DeviController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/EmployeeController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/GradesController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/HomeworkController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=$CONTROLLER_DIR/TickerController.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH

echo "Copying Models..."
SRC_PATH=app/Models/Announcement.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=app/Models/Art.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=app/Models/Audio.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=app/Models/Calender.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=app/Models/Candidate.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=app/Models/Devi.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=app/Models/Employee.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=app/Models/Grades.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=app/Models/Homework.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=app/Models/Ticker.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH

echo "Copying bootstrap/app.php with API routes enabled..."
SRC_PATH=bootstrap/app.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH

echo "Copying routes/api.php with test routes..."
SRC_PATH=routes/api.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH
SRC_PATH=routes/web.php
cp "../$SOURCE_DIR/$SRC_PATH" $SRC_PATH

echo "Copying Views..."
SRC_PATH=resources/views/layouts
mkdir -p $SRC_PATH
cp ../$SOURCE_DIR/$SRC_PATH/* $SRC_PATH/
SRC_PATH=resources/views/Announcement
mkdir -p $SRC_PATH
cp ../$SOURCE_DIR/$SRC_PATH/* $SRC_PATH/
SRC_PATH=resources/views/Art
mkdir -p $SRC_PATH
cp ../$SOURCE_DIR/$SRC_PATH/* $SRC_PATH/
SRC_PATH=resources/views/Audio
mkdir -p $SRC_PATH
cp ../$SOURCE_DIR/$SRC_PATH/* $SRC_PATH/
SRC_PATH=resources/views/Calender
mkdir -p $SRC_PATH
cp ../$SOURCE_DIR/$SRC_PATH/* $SRC_PATH/
SRC_PATH=resources/views/Candidate
mkdir -p $SRC_PATH
cp ../$SOURCE_DIR/$SRC_PATH/* $SRC_PATH/
SRC_PATH=resources/views/Devi
mkdir -p $SRC_PATH
cp ../$SOURCE_DIR/$SRC_PATH/* $SRC_PATH/
SRC_PATH=resources/views/Employee
mkdir -p $SRC_PATH
cp ../$SOURCE_DIR/$SRC_PATH/* $SRC_PATH/
SRC_PATH=resources/views/Homework
mkdir -p $SRC_PATH
cp ../$SOURCE_DIR/$SRC_PATH/* $SRC_PATH/
SRC_PATH=resources/views/Grades
mkdir -p $SRC_PATH
cp ../$SOURCE_DIR/$SRC_PATH/* $SRC_PATH/
SRC_PATH=resources/views/Ticker
mkdir -p $SRC_PATH
cp ../$SOURCE_DIR/$SRC_PATH/* $SRC_PATH/

# Apply migration template
echo "🔧 Setting up migration..."
php artisan make:migration create__d_e_v_i_table --create=students --quiet
MIGRATION_FILE=$(find database/migrations -name "*_create__d_e_v_i_table.php" | sort | tail -1)
TEMPLATES="../$SOURCE_DIR/database/_d_e_v_i_migration_template.php"
cp "$TEMPLATES" "$MIGRATION_FILE"

php artisan make:migration create_announcements_table --create=students --quiet
MIGRATION_FILE=$(find database/migrations -name "*_create_announcements_table.php" | sort | tail -1)
TEMPLATES="../$SOURCE_DIR/database/announcements_migration_template.php"
cp "$TEMPLATES" "$MIGRATION_FILE"

php artisan make:migration create_art_table --create=students --quiet
MIGRATION_FILE=$(find database/migrations -name "*_create_art_table.php" | sort | tail -1)
TEMPLATES="../$SOURCE_DIR/database/art_migration_template.php"
cp "$TEMPLATES" "$MIGRATION_FILE"

php artisan make:migration create_audio_table --create=students --quiet
MIGRATION_FILE=$(find database/migrations -name "*_create_audio_table.php" | sort | tail -1)
TEMPLATES="../$SOURCE_DIR/database/audio_migration_template.php"
cp "$TEMPLATES" "$MIGRATION_FILE"

php artisan make:migration create_candidate_table --create=students --quiet
MIGRATION_FILE=$(find database/migrations -name "*_create_candidate_table.php" | sort | tail -1)
TEMPLATES="../$SOURCE_DIR/database/candidate_migration_template.php"
cp "$TEMPLATES" "$MIGRATION_FILE"

php artisan make:migration create_employees_table --create=students --quiet
MIGRATION_FILE=$(find database/migrations -name "*_create_employees_table.php" | sort | tail -1)
TEMPLATES="../$SOURCE_DIR/database/employees_migration_template.php"
cp "$TEMPLATES" "$MIGRATION_FILE"

php artisan make:migration create_grades_table --create=students --quiet
MIGRATION_FILE=$(find database/migrations -name "*_create_grades_table.php" | sort | tail -1)
TEMPLATES="../$SOURCE_DIR/database/grades_migration_template.php"
cp "$TEMPLATES" "$MIGRATION_FILE"

php artisan make:migration create_homeworks_table --create=students --quiet
MIGRATION_FILE=$(find database/migrations -name "*_create_homeworks_table.php" | sort | tail -1)
TEMPLATES="../$SOURCE_DIR/database/homeworks_migration_template.php"
cp "$TEMPLATES" "$MIGRATION_FILE"

php artisan make:migration create_calender_table --create=students --quiet
MIGRATION_FILE=$(find database/migrations -name "*_create_calender_table.php" | sort | tail -1)
TEMPLATES="../$SOURCE_DIR/database/calender_migration_template.php"
cp "$TEMPLATES" "$MIGRATION_FILE"

php artisan make:migration create_tickers_table --create=students --quiet
MIGRATION_FILE=$(find database/migrations -name "*_create_tickers_table.php" | sort | tail -1)
TEMPLATES="../$SOURCE_DIR/database/tickers_migration_template.php"
cp "$TEMPLATES" "$MIGRATION_FILE"

echo "🏗️ Running migrations..."
php artisan migrate:fresh --force

# Clear cache
echo "🧹 Clearing cache..."
php artisan optimize:clear

echo "Verifying API routes..."
php artisan route:list --path=api

echo ""
echo "✅ Setup complete!"
echo ""
echo "To start server:"
echo "  cd $TARGET_DIR"
echo "  php artisan serve"
echo ""
echo ""
echo "To see all API routes:"
echo "  php artisan route:list --path=api"
