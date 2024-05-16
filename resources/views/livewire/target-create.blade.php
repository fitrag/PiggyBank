<div>
    <div class="bg-gradient-to-t from-violet-700 to-violet-900 pt-4 pb-44 flex text-white px-4 items-center justify-between">
        <div class="flex-none cursor-pointer" @click="window.history.back()">
            <i class='bx bx-arrow-back text-xl' ></i>
        </div>
        <div class="text-sm font-semibold">
            Buat Target
        </div>
        <div class="flex-none">
            <a href="{{ url('target/create') }}" wire:navigate class="">
                <i class='bx bx-info-circle text-xl' ></i>
            </a>
        </div>
    </div>
    <div class="mx-4 my-3 relative top-[-10em]">
        <div class="bg-white rounded-2xl px-4 py-4">
            <div class="flex flex-col space-y-5">
                <form wire:submit="save" method="post" enctype="multipart/form-data">
                    <div class="flex flex-col space-y-7">
                        <div class="">
                            <label for="" class="text-sm block mb-2">Nama Target</label>
                            <input type="text" wire:model="nama" id="" class="border rounded-lg py-2 px-2 outline-none block w-full text-sm">
                        </div>
                        <div class="">
                            <label for="" class="text-sm block mb-2">Harga Target</label>
                            <input type="text" wire:model="target" id="" class="border rounded-lg py-2 px-2 outline-none block w-full text-sm">
                        </div>
                        <div class="">
                            <label for="" class="text-sm block mb-2">Foto</label>
                            <input type="text" wire:model="foto" placeholder="http://" id="" class="border rounded-lg py-2 px-2 outline-none block w-full text-sm">
                        </div>
                        <div class="">
                            <input type="submit" value="Simpan" class="bg-blue-500 p-2 text-white w-full rounded-lg">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
