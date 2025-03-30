<div class="w-full h-screen flex flex-col justify-center items-center">
    <div class="w-[1000px]">

        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-left">URL Original</th>
                <th class="border border-gray-300 px-4 py-2 text-left">URL Encurtada</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Views</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Copiar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allUrlShorts as $url)
                <tr class="border border-gray-300 ">
                    <td class="border border-gray-300 px-4 py-2">{{ $url->url }}</td>

                    <td class="border border-gray-300 px-4 py-2 ">
                        {{$url->short_code}}
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ count($url->views) }}</td>

                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <button onclick="copyText('{{ $url->short_code }}')"
                                class="bg-blue-500 text-white px-3 py-1 rounded ">
                            Copiar
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function copyText(text) {
        navigator.clipboard.writeText(text)
        alert("Link copiado: " + text);
    }
</script>
