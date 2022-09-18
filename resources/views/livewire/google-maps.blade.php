<div>
    <div id="pesan" wire:ignore>
        <div class="inner">
            <h1 id="title">Pesan Go-Back</h1>
            <form>
                <div class="form-group">
                    <label>Masukkan Lokasi Anda</label>
                    <input type="text" class="form-control" id="start" placeholder="Jl. Mayjend Ahmad Yani" required>
                </div>

                <div class="form-group">
                    <!-- <label>Masukkan Lokasi Tujuan</label> -->
                    <input type="hidden" class="form-control" id="end" placeholder="Jl. Semarang" required value="Erna Sari Catering, Waluya, Bandung Regency, West Java, Indonesia">
                </div>
                <input type="submit" class="btn btn-light" id="pesan-btn" value="Pesan">
            </form>

            <div id="detail">
                <hr />
                <h4>Detail Pesanan</h4>
                <div class="card-custom">
                    <table>
                        <tr>
                            <th>Jarak</th>
                            <th>:</th>
                            <td id="distance"></td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <th>:</th>
                            <td id="duration"></td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <th>:</th>
                            <td id="price"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="map" wire:ignore></div>
</div>
