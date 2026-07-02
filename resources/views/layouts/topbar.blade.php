<header class="bg-white shadow px-8 py-4 flex justify-between items-center">

    <div>

        <h1 class="text-xl font-bold text-gray-800">
            Dashboard EduInsight
        </h1>

    </div>

    <div class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-5 py-2 rounded-xl shadow">

        <span class="font-semibold capitalize">
            {{ Auth::user()->role }}
        </span>

    </div>

</header>