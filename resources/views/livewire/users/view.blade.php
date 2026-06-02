@section('title', __('Users'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-fw fa-users"></i>
                                {{ $level_filter ?? "User" }}
                                <span class="badge badge-primary ml-1">{{ number_format($total) }}</span>
                            </h6>
                        </div>
                        <div class="col-md-4 text-center">
                            @if (session()->has('message'))
                                <div wire:poll.4s class="badge badge-success p-2" style="font-size: 0.85rem;">
                                    <i class="fas fa-check-circle mr-1"></i>{{ session('message') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 text-right">
                            <button class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#createDataModal">
                                <i class="fa fa-plus fa-sm text-white-50 mr-1"></i> Tambah User
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.users.create')
                    @include('livewire.users.update')

                    {{-- Filter & Search Bar --}}
                    <div class="row mb-3 align-items-end">
                        {{-- Search --}}
                        <div class="col-md-4 mb-2 mb-md-0">
                            <label class="small font-weight-bold text-gray-600 mb-1">
                                <i class="fas fa-search fa-xs mr-1"></i>Cari User
                            </label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0">
                                        <i class="fas fa-search text-gray-400"></i>
                                    </span>
                                </div>
                                <input wire:model='keyWord' type="text"
                                    class="form-control border-left-0"
                                    placeholder="Nama, username, email...">
                            </div>
                        </div>

                        {{-- Filter Status --}}
                        <div class="col-md-3 mb-2 mb-md-0">
                            <label class="small font-weight-bold text-gray-600 mb-1">
                                <i class="fas fa-toggle-on fa-xs mr-1"></i>Status
                            </label>
                            <select wire:model='filterStatus' class="form-control form-control-sm">
                                <option value="">— Semua Status —</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                        </div>

                        {{-- Filter Status Login --}}
                        <div class="col-md-3 mb-2 mb-md-0">
                            <label class="small font-weight-bold text-gray-600 mb-1">
                                <i class="fas fa-circle fa-xs mr-1"></i>Status Login
                            </label>
                            <select wire:model='filterLogin' class="form-control form-control-sm">
                                <option value="">— Semua —</option>
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                            </select>
                        </div>

                        {{-- Reset Filter --}}
                        <div class="col-md-2 text-right">
                            <button wire:click="resetFilter" class="btn btn-sm btn-outline-secondary w-100">
                                <i class="fas fa-undo fa-xs mr-1"></i>Reset
                            </button>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm" style="font-size: 0.875rem;">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" style="width: 50px;">#ID</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th class="text-center" style="width: 90px;">Level</th>
                                    <th class="text-center" style="width: 110px;">Mendaftar</th>
                                    <th class="text-center" style="width: 80px;">Status</th>
                                    <th class="text-center" style="width: 80px;">Login</th>
                                    <th class="text-center" style="width: 80px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $row)
                                <tr>
                                    <td class="text-center text-muted">{{ $row->id }}</td>
                                    <td class="font-weight-bold">{{ $row->name }}</td>
                                    <td class="text-muted">{{ $row->username }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td class="text-center">
                                        <span class="badge badge-secondary">{{ $row->level }}</span>
                                    </td>
                                    <td class="text-center text-muted small">
                                        {{ $row->created_at->diffForHumans() }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $row->status == 'Aktif' ? 'success' : 'danger' }}">
                                            {{ $row->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $row->sessions_count > 0 ? 'success' : 'secondary' }}">
                                            <i class="fas fa-circle mr-1" style="font-size: 0.5rem;"></i>
                                            {{ $row->sessions_count > 0 ? 'Online' : 'Offline' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button"
                                                class="btn btn-info btn-sm dropdown-toggle px-2 py-1"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right shadow">
                                                <h6 class="dropdown-header small">Kelola User</h6>
                                                <a href="javascript:void(0);"
                                                    data-toggle="modal"
                                                    data-target="#updateModal"
                                                    class="dropdown-item small"
                                                    wire:click="edit({{ $row->id }})">
                                                    <i class="fa fa-edit fa-fw mr-1 text-primary"></i> Edit
                                                </a>

                                                @if($row->id !== auth()->user()->id)
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0);"
                                                        class="dropdown-item small"
                                                        onclick="confirm('Update Status User {{ $row->name }}?')||event.stopImmediatePropagation()"
                                                        wire:click="updateStatus({{ $row->id }})">
                                                        <i class="fa fa-power-off fa-fw mr-1 text-{{ $row->status == 'Aktif' ? 'warning' : 'success' }}"></i>
                                                        {{ $row->status == 'Aktif' ? 'Nonaktifkan' : 'Aktifkan' }}
                                                    </a>

                                                    @if($row->sessions_count > 0)
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item small"
                                                            onclick="confirm('Hapus semua session user {{ $row->name }}?')||event.stopImmediatePropagation()"
                                                            wire:click="destroySession({{ $row->id }})">
                                                            <i class="fa fa-sign-out-alt fa-fw mr-1 text-warning"></i> Hapus Session
                                                        </a>
                                                    @endif

                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0);"
                                                        class="dropdown-item small text-danger"
                                                        onclick="confirm('Confirm Delete User id {{ $row->id }}? \nDeleted Users cannot be recovered!')||event.stopImmediatePropagation()"
                                                        wire:click="destroy({{ $row->id }})">
                                                        <i class="fa fa-trash fa-fw mr-1"></i> Hapus
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-4">
                                        <i class="fas fa-users fa-2x mb-2 d-block"></i>
                                        Tidak ada data user ditemukan.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end mt-2">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>