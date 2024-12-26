<div>
   <h1>Lista de usuários</h1>

    {{ $type }}

    {{-- @if($type === 'lista')
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">
                    {{ $user->name }}
                </li>
            @endforeach
        </ul>
    @elseif($type === 'card')
        @foreach($users as $user)
            <div class="card shadow mb-2">
                <div class="card-body">
                    {{ $user->name }}
                </div>
            </div>
        @endforeach
    @endif --}}

    <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
        <li class="nav-item" role="presentation">
            <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Contact</button>
        </li>
    </ul>

</div>