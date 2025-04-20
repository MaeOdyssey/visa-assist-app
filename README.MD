Visa Journey

A mock freelance app built with Laravel + Vue + Tailwind, focused on making visa application management feel human, intuitive, and kind.

🧠 Case Study Overview

Visa Journey was created as part of my full-stack portfolio to demonstrate technical skill and design thinking around a topic that often feels intimidating: visa applications. My goal was to take something traditionally cold and bureaucratic—and reimagine it as something approachable, human, and supportive.

This was a fast-paced MVP challenge where I aimed to:

Build a Laravel + Sanctum auth backend (register, login, roles)

Create Vue 3 + Tailwind UI for clients and admins

Integrate token-based APIs with live data

Seed realistic users and applications

✨ Features

✅ Auth System

Login, Register, Logout

Role-based routing (Admin vs Client)

✅ Admin Portal

View and review submitted visa applications

Update application status

View submitted documents (placeholder)

✅ Client Portal

Submit new visa applications (Visa Type + Purpose)

View application status updates

Friendly dashboard UI

✅ Tech Stack

Laravel 11 backend

Sanctum for API authentication

Vue 3 frontend with TypeScript

Tailwind CSS for styling

💡 Things I Loved

💙 Designing the Dashboard

This was my favorite part—making the interface feel alive with soft colors, curved cards, glowy buttons, and meaningful layout.

🧩 SVG vs PNG gotcha

I hit a weird wall where SVG illustrations wouldn't load as expected in the MainScreenView. Turns out Vite doesn't always resolve them intuitively unless declared in vite-env.d.ts. Switching to PNG solved it—and taught me more about Vue's asset pipeline.

🌍 Making It Feel Kind

Most visa systems feel stiff and stressful. I deliberately used inclusive language, gentle colors, and accessible layouts to counter that. This wasn’t just a tech exercise—it was about emotionally shaping UX.

📂 Setup Instructions

# Backend (Laravel)
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

# Frontend (Vue)
cd frontend
npm install
npm run dev

Make sure your backend is running at http://localhost:8000 and the frontend is hitting the correct API base.

👤 Test Credentials

Admin

Email: admin@example.com

Password: password123

Client

Email: client@example.com

Password: password123

🚀 Status

✅ Finished MVP – proudly portfolio ready!

