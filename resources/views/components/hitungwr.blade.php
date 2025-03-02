@extends('../main')
@section('content') 
@include('../navbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto mt-5">
            <div class="pb-4 ">
                <div class="text-center mb-3">
                    <a class="relative w-auto" href="{{ url('') }}">
                    <img src="{{ !$config ? '' : $config->og_image }}" class="mlImg" alt="akumauweb" width="150" height="150">
                    </a>
                </div>
                <div class="section shadow bg-gradient p-3 akumauweb-rounded-sedang">
                    <div class="card-header">
                        <h5 class="text-white mt-3 mb-1 text-center">Calculator Winrate Mobile Legends</h5>
                     <div class="card header mt-2"></div>
                        <div class="card-body">
                            <div class="card-body">
                                <form class="mb-3">
                                    <div class="mb-3">
                                        <label class="mb-1 mt-3" for="idMatch">Total Pertandingan Anda</label>
                                        <input type="number" placeholder="Contoh: 351" autofocus="" autocomplete="off" id="tMatch" class="form-control" fdprocessedid="qig8c" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1" for="tWr">Total Win Rate Anda</label>
                                        <input type="number" placeholder="Contoh: 51.4%" step="any" autocomplete="off" id="tWr" class="form-control" fdprocessedid="0zbkj" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1" for="wrReq">Win Rate yang anda inginkan</label>
                                        <input type="number" placeholder="Contoh: 70%" step="any" autocomplete="off" id="wrReq" class="form-control" fdprocessedid="pfhxs" />
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-primary d-block w-100" type="button" id="hasil" fdprocessedid="21xmy">Hasil</button>
                                        </div>
                                        <!--<div class="col">-->
                                        <!--    <a class="btn btn-primary d-block w-100" href="{{ url('/order/joki-classic') }}">Order Joki</a>-->
                                        <!--</div>-->
                                    </div>
                                </form>
                                <span id="resultText" class="text-center d-block"> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('../footer')    
@section('js')
<script>
        const tMatch = document.querySelector("#tMatch");
        const tWr = document.querySelector("#tWr");
        const wrReq = document.querySelector("#wrReq");
        const hasil = document.querySelector("#hasil");
        const resultText = document.querySelector("#resultText");
        function res() {
            const resultNum = rumus(tMatch.value, tWr.value, wrReq.value);
            const text =
                `Anda memerlukan sekitar <b>${resultNum}</b> win tanpa lose untuk mendapatkan win rate <b>${wrReq.value}%</b>`;
            resultText.innerHTML = text;
        }
        function rumus(tMatch, tWr, wrReq) {
            let tWin = tMatch * (tWr / 100);
            let tLose = tMatch - tWin;
            let sisaWr = 100 - wrReq;
            let wrResult = 100 / sisaWr;
            let seratusPersen = tLose * wrResult;
            let final = seratusPersen - tMatch;
            return Math.round(final);
        }
        window.addEventListener("load", init);
        function init() {
            load();
            eventListener();
        }

        function load() {}
        function eventListener() {
            hasil.addEventListener("click", res);
        }
    </script>
@endsection
@endsection