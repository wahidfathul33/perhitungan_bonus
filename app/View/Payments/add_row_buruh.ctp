<div class="row" style="padding-bottom: 0px; margin-bottom: -50px;" id="form_<?= $random ?>">
    <div class="col-4">
        <select class="form-control" style="margin-top: -2px;" required name="data[PaymentEmployee][employee_id][]">
            <option value=""></option>
            <?php foreach ($employees as $val) { ?>
            <option value="<?php echo $val['Employee']['id']; ?>"><?php echo $val['Employee']['nama']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-3">
        <div class="input-group" style="margin-top: -10px;">
            <input type="hidden" id="old_persen_<?= $random ?>">
            <input type="number" id="persen_<?= $random ?>" onchange="hitung(<?= $random ?>)" class="form-control" min="0" max="100" required name="data[PaymentEmployee][persen][]">
            <div class="input-group-prepend">
                <span class="input-group-text" style="margin: -8px 0px 0px -8px;">%</span>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="input-group" style="margin-top: -10px;">
            <div class="input-group-prepend">
                <span class="input-group-text" style="margin: -8px -8px 0px 0px;">Rp</span>
            </div>
            <input type="number" id="nominal_<?= $random ?>" class="form-control" readonly name="data[PaymentEmployee][nominal][]">
        </div>
    </div>
    <div class="col-2" align="center">
        <span class="btn btn-sm btn-danger" onclick="delList(<?= $random ?>)">Hapus</i></span>
    </div>
</div>