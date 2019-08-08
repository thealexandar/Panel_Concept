<div class="form-group">
                            <label for="exampleInputEmail1">Age</label>
                            <div class="form-row">
                                <div class="col">
                                    <select name="" id="" class="custom-select">
                                        <option selected>Year</option>
                                        <?php for($i=2019;$i>1950;$i--){ ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="" id="" class="custom-select">
                                        <option selected>Day</option>
                                        <?php for($i=1;$i<32;$i++){ ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="" id="" class="custom-select">
                                        <option selected>Month</option>
                                        <option value="january">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                            </div>
                        </div>