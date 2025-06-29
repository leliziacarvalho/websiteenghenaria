<!DOCTYPE html>
<html lang="tl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Submete Monografia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #3b0764, #5e239d);
            min-height: 100vh;
            padding: 3rem 1rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        /* Fokus glow animasi */
        input:focus, select:focus, textarea:focus {
            outline: none;
            box-shadow: 0 0 8px 2px #7c3aed; /* ungu terang */
            border-color: #7c3aed;
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }
        /* Animasi masuk untuk form */
        .fade-in {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="max-w-4xl mx-auto bg-white bg-opacity-90 p-10 rounded-3xl shadow-2xl fade-in">
        <h2 class="text-3xl font-bold mb-8 text-center text-purple-900 drop-shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-8 h-8 mr-2 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8h7v8H3z" />
            </svg>
            Formuláriu Submisaun Monografia
        </h2>

        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6 border border-green-400 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6 border border-red-400 shadow-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('monografia.submit') }}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @csrf

            <div>
                <label class="block font-medium mb-2 flex items-center text-purple-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7" />
                    </svg>
                    Numeru Estudante
                </label>
                <input type="text" name="numeru_estudante" value="{{ old('numeru_estudante') }}"
                    class="w-full border border-purple-300 rounded-lg px-3 py-2 @error('numeru_estudante') border-red-500 @enderror" required>
            </div>

            <div>
                <label class="block font-medium mb-2 flex items-center text-purple-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
                    </svg>
                    Titulo
                </label>
                <input type="text" name="titulun" value="{{ old('titulun') }}"
                    class="w-full border border-purple-300 rounded-lg px-3 py-2 @error('titulun') border-red-500 @enderror" required>
            </div>

            <div>
                <label class="block font-medium mb-2 flex items-center text-purple-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h4l3 6 4-8 3 6h4" />
                    </svg>
                    Area Estudu
                </label>
                <select name="area_estudu"
                    class="w-full border border-purple-300 rounded-lg px-3 py-2 @error('area_estudu') border-red-500 @enderror" required>
                    <option value="">-- Seleciona --</option>
                    <option value="Programing" {{ old('area_estudu') == 'Programing' ? 'selected' : '' }}>Programing</option>
                    <option value="Networking" {{ old('area_estudu') == 'Networking' ? 'selected' : '' }}>Networking</option>
                    <option value="Multimedia" {{ old('area_estudu') == 'Multimedia' ? 'selected' : '' }}>Multimedia</option>
                    <option value="Outros" {{ old('area_estudu') == 'Outros' ? 'selected' : '' }}>Outros</option>
                </select>
            </div>

            <div>
                <label class="block font-medium mb-2 flex items-center text-purple-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h7" />
                    </svg>
                    Palavras-chave
                </label>
                <input type="text" name="palavras_chave" value="{{ old('palavras_chave') }}"
                    class="w-full border border-purple-300 rounded-lg px-3 py-2 @error('palavras_chave') border-red-500 @enderror"
                    placeholder="Ex: teknologi, rede, sistema" required>
            </div>

            <div class="md:col-span-2">
                <label class="block font-medium mb-2 flex items-center text-purple-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h8M8 14h6m-6 4h4" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v2" />
                    </svg>
                    Resumo
                </label>
                <textarea name="resumu" rows="4"
                    class="w-full border border-purple-300 rounded-lg px-3 py-2 @error('resumu') border-red-500 @enderror"
                    required>{{ old('resumu') }}</textarea>
            </div>

            <div>
                <label class="block font-medium mb-2 flex items-center text-purple-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6h4v12h-4z" />
                    </svg>
                    Orientador
                </label>
                <select name="orientador_id"
                    class="w-full border border-purple-300 rounded-lg px-3 py-2 @error('orientador_id') border-red-500 @enderror" required>
                    <option value="">-- Seleciona Orientador --</option>
                    @foreach($orientadores as $orientador)
                        <option value="{{ $orientador->id }}" {{ old('orientador_id') == $orientador->id ? 'selected' : '' }}>
                            {{ $orientador->naran }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium mb-2 flex items-center text-purple-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Dokumentu Monografia (PDF/DOC)
                </label>
                <input type="file" name="dokumentu" accept=".pdf,.doc,.docx"
                    class="w-full @error('dokumentu') border-red-500 @enderror" required>
            </div>

            <div class="md:col-span-2 flex items-center gap-6 mt-6">
                <button type="submit"
                    class="bg-purple-700 hover:bg-purple-800 text-white px-8 py-3 rounded-lg font-semibold shadow-lg transition transform hover:-translate-y-0.5">
                    Submete
                </button>
                <a href="{{ route('home') }}"
                   class="px-8 py-3 border border-purple-700 rounded-lg text-purple-700 hover:bg-purple-100 transition">
                    Kansela
                </a>
            </div>
        </form>
    </div>
</body>
</html>
