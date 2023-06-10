<ul class="nav nav-pills mb-2" style="margin-left: -10px"> <!--baru ditambahkan-->
    @foreach ($fakultas as $fakultass)
        <li id="fakultasSelect" class="nav-item">
            @if ($fakultass->id === 1)
                <a href="#" class="nav-link link" aria-current="page">{{ $fakultass->nama_fakultas }}</a>
                @elseif ($fakultass->id === 2)
                <a href="#" class="nav-link link" aria-current="page">{{ $fakultass->nama_fakultas }}</a>
                @elseif ($fakultass->id === 3)
                <a href="#" class="nav-link link" aria-current="page">{{ $fakultass->nama_fakultas }}</a>
                @elseif ($fakultass->id === 4)
                <a href="#" class="nav-link link" aria-current="page">{{ $fakultass->nama_fakultas }}</a>
                @elseif ($fakultass->id === 5)
                <a href="#" class="nav-link link" aria-current="page">{{ $fakultass->nama_fakultas }}</a>
                @elseif ($fakultass->id === 6)
                <a href="#" class="nav-link link" aria-current="page">{{ $fakultass->nama_fakultas }}</a>
                @elseif ($fakultass->id === 7)
                <a href="#" class="nav-link link" aria-current="page">{{ $fakultass->nama_fakultas }}</a>
            @endif
        </li>
    @endforeach
</ul>

<div class="main my-3 mx-2"> <!--baru ditambahkan-->
    <div class="dropdown px-3">
        <div class="form-control-wrap col-lg-4 col-sm-6">
            <select class="form-select box-shadow" aria-label="Default select example">
                <option selected>-- Program Studi --</option>
                <option value="1">Lorem Ipsum</option>
                <option value="2">Lorem Ipsum</option>
                <option value="3">Lorem Ipsum</option>
            </select>
        </div>
    </div> <!--dropdown-->
</div> <!--main-->