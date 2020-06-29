<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <p>Paid Type</p>
                        <select name="type" class="form-control">
                            <option value=""> - Select One - </option>
                            <option value="dp">DP</option>
                            <option value="repayment">Repayment</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <p>Amount</p>
                        <input type="number" name="amount" class="form-control" value="{{ old('amount') }}">
                    </div>

                    <input type="submit" value="PROCESS">
                </div>
                
            </div>
        </div>
    </div>
</div>