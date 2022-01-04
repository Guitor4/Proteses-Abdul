<div class="container">
    <div class="d-flex justify-content-center p-3 bg-dark text-white mt-3 ">
        <div class="col-12 border border-light rounded">
            <div class="bg-dark d-flex justify-content-center">
                <h3>System Settings</h3>
            </div>

            <form method="POST">
                <div class="row p-3">
                    <div class="col-8 offset-4">
                        <div class="form-group" style="width:50%">
                            <label class="" for="intervalo">Interval between appointments</label>
                            <select name="intervalo" class="selectpicker form-control" data-live-search="true" data-size=4>
                                <option <?=($intervalo == "PT15M" ? 'selected = selected':'')?>value="PT15M">15 Minutes</option>
                                <option <?=($intervalo == "PT30M" ? 'selected = selected':'')?>value="PT30M">30 Minutes</option>
                                <option <?=($intervalo == "PT45M" ? 'selected = selected':'')?>value="PT45M">45 Minutes</option>
                                <option <?=($intervalo == "PT60M" ? 'selected = selected':'')?>value="PT60M">1 Hour</option>
                                <option <?=($intervalo == "PT120M" ? 'selected = selected':'')?>value="PT120M">2 Hours</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class = "d-flex justify-content-center">
                    <input type="submit" name="salvar" class="btn btn-success btn-lg" value="Salvar"></input>
                </div>
            </form>
        </div>

    </div>

</div>