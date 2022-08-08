<br>
<br>
    <div class="container" style="background-color: rgb(255, 255, 255);box-shadow: 0 1px 1px 0 rgb(0 0 0 / 20%);min-height: 580px;">
        <br>
        <div class="progress-bar2" style="width:75%;margin-left:12.5%">
            <div class="step2" style="color: #1abc9c;background-color: #1abc9c"></div>
            <div class="step2"></div>
            <div class="step2"></div>
            <div class="step2"></div>
        </div>
        <div>
            <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label style="font-weight:700;color: #3d3d3d !important">‣ Dados Pessoais</label>
                    </div>
                </div>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <label>Nome</label> <span style="color:red">*</span>
                    <input type="text" class="form-control" id="txtNome" name="txtNome">
                </div>
                <div class="col-sm-3">
                    <label>Sobrenome</label> <span style="color:red">*</span>
                    <input type="text" class="form-control" id="txtSobrenome" name="txtSobrenome">
                </div>
                <div class="col-sm-3">
                    <label>CPF</label> <span style="color:red">*</span>
                    <input type="text" class="form-control" id="txtCpf" name="txtCpf">
                </div>
                <div class="col-sm-3">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" id="dateDataNascimento" name="dateDataNascimento">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <label>Endereço</label>
                    <input type="text" class="form-control" id="txtEndereco" name="txtEndereco">
                </div>
                <div class="col-sm-3">
                    <label>Cidade</label>
                    <input type="text" class="form-control" id="txtCidade" name="txtCidade">
                </div>
                <div class="col-sm-3">
                    <label>CEP</label> <span style="color:red">*</span>
                    <input type="text" class="form-control" id="txtCep" name="txtCep">
                </div>
            </div>
            <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label style="font-weight:700;color: #3d3d3d !important">‣ Dados de Contato</label>
                    </div>
                </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <label>Email</label> <span style="color:red">*</span>
                    <input type="text" class="form-control" id="txtEmail" name="txtEmail">
                </div>
                <div class="col-sm-3">
                    <label>Telefone</label>
                    <input type="text" class="form-control" id="txtTelefone" name="txtTelefone">
                </div>
                <div class="col-sm-3">
                    <label>Celular</label>
                    <input type="text" class="form-control" id="txtCelular" name="txtCelular">
                </div>
            </div>
        </div>
    <br>
    </div>
    
    <div class="container">
        <div class="panel-footer2">
            <button class="btn2 back-btn2" type="button" onclick="window.location.href = 'TelaQuarto.php?id=<?php echo $_GET['id']; ?>'">Voltar</button>
            <button class="btn2 next-btn2" type="button" onclick="MudaFrame('2')">Próximo</button>
        </div>
    </div>
    <br>