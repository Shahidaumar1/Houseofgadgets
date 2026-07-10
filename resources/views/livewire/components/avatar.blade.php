  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 text-black ">
      <img src="{{ $user->avater ?? 'https://mdbcdn.b-cdn.net/img/new/avatars/2.webp' }}" alt="hugenerd" width="40"
          height="40" class="rounded-circle" />
      <span class="fw-bold">{{ $user->name ?? 'John Doe' }}</span>
  </a>
