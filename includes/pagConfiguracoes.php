<div class="container">
    <div class="d-flex justify-content-center p-3 bg-dark text-white mt-3 ">
        <div class="col-12 border border-light rounded">
            <div class="bg-dark d-flex justify-content-center">
                <h3>Configurações do sistema</h3>
            </div>

            <form method="POST">
                <div class="row p-3">
                    <div class="col-6">
                        <div class="form-group" style="width:50%">
                            <label class="" for="intervalo">Intervalo Entre consultas</label>
                            <select name="intervalo" class="selectpicker form-control" data-live-search="true" data-size=4>
                                <option <?=($intervalo == "PT15M" ? 'selected = selected':'')?>value="PT15M">15 Minutos</option>
                                <option <?=($intervalo == "PT30M" ? 'selected = selected':'')?>value="PT30M">30 Minutos</option>
                                <option <?=($intervalo == "PT45M" ? 'selected = selected':'')?>value="PT45M">45 Minutos</option>
                                <option <?=($intervalo == "PT60M" ? 'selected = selected':'')?>value="PT60M">1 Hora</option>
                                <option <?=($intervalo == "PT120M" ? 'selected = selected':'')?>value="PT120M">2 Hora</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="" for="intervalo2">Intervalo Entre consultas</label>
                            <select name="intervalo2" class="form-control">
                                <option value="PT30M">30 Minutos</option>
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