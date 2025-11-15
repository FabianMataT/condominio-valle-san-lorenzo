<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Condominio Valle San Lorenzo</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFDFC] flex items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            {{-- Logo y nombre del condominio --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-green-700 hover:text-green-800 transition">
                <span class="text-2xl">🏡</span>
                <span class="text-lg md:text-xl font-semibold">
                    Condominio Valle San Lorenzo
                </span>
            </a>

            {{-- Navegación --}}
            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md font-medium transition">
                            Ir al Panel
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-2 text-green-700 border border-green-700 hover:bg-green-700 hover:text-white rounded-md font-medium transition">
                            Iniciar sesión
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-2 text-white bg-green-600 hover:bg-green-700 rounded-md font-medium transition">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <div>
        <main class="min-h-screen bg-gray-50">
            {{-- Hero Section --}}
            <section class="relative mt-6">
                <img src="https://www.novogar.cr/wp-content/uploads/2022/06/valle-san-lorenzo-1.webp"
                    alt="Condominio Valle San Lorenzo" class="w-full h-[600px] object-cover brightness-75">

                <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg">
                        ¡Tu nuevo hogar espera en Valle San Lorenzo!
                    </h1>
                    <p class="max-w-2xl text-lg md:text-xl mb-8">
                        Vive rodeado de vegetación, tranquilidad y amenidades únicas para tu familia.
                    </p>

                    <a href="{{ route('login') }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold shadow-lg transition">
                        Iniciar Sesión
                    </a>
                </div>
            </section>

            {{-- Descripción --}}
            <section class="py-16 px-6 md:px-12 text-center bg-white">
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Sobre Valle San Lorenzo</h2>
                <p class="max-w-4xl mx-auto text-gray-600 leading-relaxed">
                    En Valle San Lorenzo vivirás rodeado de vegetación y naturaleza, con casas de una planta de 2 o 3
                    habitaciones,
                    2 baños y cochera techada para 2 vehículos. El condominio está diseñado para ofrecer confort,
                    seguridad y una
                    vida en comunidad de calidad.
                </p>
            </section>

            {{-- Amenidades --}}
            <section class="py-16 px-6 md:px-12 bg-gray-100">
                <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Amenidades</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-gray-700">
                    @php
                        $amenidades = [
                            ['🏠', 'Casa Club'],
                            ['🐾', 'Parque para mascotas'],
                            ['🏊‍♂️', 'Piscina para adultos y niños'],
                            ['🎠', 'Área de juegos infantiles'],
                            ['🍖', 'Áreas para BBQ'],
                            ['⚽', 'Cancha de fútbol 5'],
                            ['🛡️', 'Seguridad 24/7'],
                        ];
                    @endphp

                    @foreach ($amenidades as [$icono, $titulo])
                        <div
                            class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition">
                            <div class="text-5xl mb-3">{{ $icono }}</div>
                            <h3 class="text-lg font-semibold">{{ $titulo }}</h3>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- Ubicación --}}
            <section class="py-16 px-6 md:px-12 bg-white">
                <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Ubicación</h2>

                <p class="text-center text-gray-600 mb-8">
                    Heredia, de la iglesia católica de San Lorenzo 200 este y 400 norte.
                </p>

                <div class="flex justify-center">
                    <iframe src="https://www.google.com/maps?q=San+Lorenzo,+Heredia,+Costa+Rica&output=embed"
                        width="100%" height="400" class="rounded-2xl shadow-lg max-w-4xl border-0">
                    </iframe>
                </div>
            </section>

            {{-- Advertencia --}}
            <section class="py-12 bg-gray-900 text-gray-300 text-sm px-6 md:px-12">
                <div class="max-w-5xl mx-auto space-y-4">
                    <h2 class="text-lg font-semibold text-white">Advertencia</h2>
                    <p>
                        Se advierte al público que <strong>3-101-820946 S.A</strong> es supervisada solamente en materia
                        de prevención
                        de legitimación de capitales, financiamiento al terrorismo y financiamiento de la proliferación
                        de armas de
                        destrucción masiva, y además se encuentra sujeta a disposiciones vinculantes de la Unidad de
                        Inteligencia
                        Financiera del Instituto Costarricense sobre Drogas.
                    </p>
                    <p>
                        Por lo tanto, la Sugef no supervisa en materia financiera a 3-101-820946 S.A, ni los negocios
                        que ofrece,
                        ni su seguridad, estabilidad o solvencia.
                    </p>
                </div>
            </section>

            {{-- Cercanías --}}
            <section class="py-16 px-6 md:px-12 bg-gray-100">
                <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Nos encontramos cerca de</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto text-gray-700">
                    <div>
                        <h3 class="font-semibold mb-2 text-lg">Centros educativos</h3>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Complejo Educativo Sanangel</li>
                            <li>Saint Nicholas Of Flüe School</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="font-semibold mb-2 text-lg">Centros comerciales</h3>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Oxígeno</li>
                            <li>Vindi San Joaquín</li>
                            <li>Auto Mercado Heredia</li>
                            <li>Mega Súper Heredia</li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>
    </div>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>
<footer class="bg-green-700 text-white py-6 text-center w-full mt-8">
    <p class="text-sm">
        © {{ date('Y') }} Condominio Valle San Lorenzo — Todos los derechos reservados.
    </p>
</footer>

</html>
