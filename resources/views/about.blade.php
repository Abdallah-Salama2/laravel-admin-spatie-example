<x-app-layout>


    <div class="container">
        <h1>Please try logging in with the following admin credentials to view admin features :</h1>
        <div class="login-info">
            <p class="info-text">Admin Account:</p>
            <div class="credentials">
                <p>Email: <span>admin@example.com</span></p>
                <p>Password: <span>password</span></p>
            </div>
        </div>
    </div>


</x-app-layout>


<style>
    body {
        background-color: #1f2937;
        color: #e5e7eb;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        text-align: center;
    }

    h1 {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    p {
        font-size: 1rem;
        margin-bottom: 2rem;
    }

    .login-info {
        background-color: #374151;
        padding: 1rem;
        border-radius: 0.5rem;
    }

    .info-text {
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .credentials {
        font-weight: bold;
        font-size: 1.1rem;
        padding: 0.5rem;
        border: 2px solid #6b7280;
        border-radius: 0.5rem;
        background-color: #4b5563;
        margin-top: 1rem;
    }

    .credentials span {
        color: #d1d5db;
    }
</style>
