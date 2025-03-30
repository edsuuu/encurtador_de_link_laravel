<div class="w-full h-screen flex flex-col justify-center items-center ">
    <div class="w-[800px] p-4">

        @if($urlShort)
            <div class="flex flex-col gap-4 mt-10">
                <h1 class="text-2xl font-bold text-center text-green-500">Copiar seu link encurtado</h1>


                <input type="text" class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-500" disabled value="{{ $urlShort }}">
                <button
                    class="bg-blue-900 w-full font-bold text-white rounded-[5px] py-2 transition-all duration-200 active:scale-[0.99] cursor-pointer"
                    onclick="copyUrlShort()">
                    Copiar
                </button>

                <button
                    class="bg-blue-900 w-full font-bold text-white rounded-[5px] py-2 transition-all duration-200 active:scale-[0.99] cursor-pointer" wire:click="$set('urlShort', '')">
                    Gerar um novo Link
                </button>
            </div>
        @else
            <div>
                <h1 class="text-2xl text-center font-bold">Encurtador de Link !</h1>
            </div>

            <form method="POST" wire:submit.prevent="saveUrlForShortner" class="flex flex-col gap-2 mt-4">
                @csrf
                <div class="flex flex-col gap-5">
                    <div class="text-black flex flex-col gap-0.5">
                        <p class="text-gray-700 text-[15px] font-medium">Nome do link</p>
                        <input type="text" placeholder="Digite o nome do link" wire:model="title"
                               class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-500">
                        @error('title')
                        <span class="text-red-500 text-[13px] mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-black flex flex-col gap-0.5">
                        <p class="text-gray-700 text-[15px] font-medium">Seu Link</p>
                        <input type="text" placeholder="Digite o seu link" wire:model="link"
                               class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-500">
                        @error('link')
                        <span class="text-red-500 text-[13px] mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit"
                            class="bg-blue-900 w-full font-bold text-white rounded-[5px] py-2 transition-all duration-200 active:scale-[0.99]">
                        Gerar link encurtado
                    </button>
                </div>
            </form>
        @endif
    </div>

</div>


<script>
    function copyUrlShort() {
        navigator.clipboard.writeText('{{ $urlShort }}');
        alert('Copiado com sucesso !');
    }
</script>
