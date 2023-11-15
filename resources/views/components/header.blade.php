<header class="header border-b">
    <div class="flex justify-between w-full">
        <div class="w-full p-5">
            <h2 class=" text-[#785839] font-semibold tracking-tighter lg:text-2xl text-sm">Sistem Informasi Pelaporan
                Indikator Pelayanan Rawat Inap</h2>
        </div>
        <div class="w-full flex justify-end">
            <div class="dropdown border-l p-5 hover:bg-neutral-100">
                <button class="dropdown-account-toggle mt-1 "><span
                        class="flex gap-5 mt-0 font-semibold text-gray-600"><span>{{ auth()->user()->name }}</span>
                        <iconify-icon icon="iconamoon:arrow-down-2-duotone" class="text-2xl"></iconify-icon>
                    </span></button>
                <div class="dropdown-menu hidden">
                    <div class="avatar-account flex gap-1 border-b p-2">
                        <div class="avatar-profile p-3">
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }} Muktiwati" class="w-12 rounded-full"
                                alt="" srcset="">
                        </div>
                        <div class="avatar">
                            <h2 class="font-bold">{{ auth()->user()->name }}</h2>
                            <p class="text-sm"></p>
                        </div>
                    </div>
                    <ul class="dropdown-menu-item">
                        <li>
                            <a href="#">
                                <button class="item-dropdown">Profile</button>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <button class="item-dropdown">Reset Passowrd</button>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="btn-logout">
                                <button class="item-dropdown">Logout</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

@push('script-injection')
    <script>
        $("#btn-logout").on('click', function() {
            Swal.fire({
                title: 'Keluar',
                html: 'Affakah yakin akan mengakhiri sesi ini?',
                icon: 'question',
                iconColor: '#DC3545',
                showCancelButton: true,
                confirmButtonText: 'Logout',
                cancelButtonText: `Batal`,
                confirmButtonColor: '#DC3545'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('logout') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                const url = "{{ route('login') }}"
                                window.location.href = url;
                            }
                        },
                        error: function(e) {
                            console.log(e)
                        }
                    });
                }
            });
        });
    </script>
@endpush
