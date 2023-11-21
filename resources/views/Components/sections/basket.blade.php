<div>
    <div class="row align-end mb-3">

        <div class="col-8 basket-block">

            <div class="basket-products row">
                <p class="col-7">Товар(ы) </p>
                <p class="col-2">Цена </p>
                <p class="col-2">Сумма  </p>
                <p class="col-1">шт </p>

            </div>

            @foreach($products as $product)
                <div class="basket-products row">
                    <p class="col-7"> {{ $product->Name }}</p>
                    <p class="col-2"> {{ str_replace('.0000', '', $product->Price) }}</p>
                    <p class="col-2"> {{ str_replace('.0000', '', $product->Price) * Arr::get($basket, $product->Id) }} </p>
                    <p class="col-1"> {{ Arr::get($basket, $product->Id) }} </p>
                    {{--<input class="col-1" name="count" value="{{ Arr::get($basket, $product->Id) }}">--}}
                </div>
            @endforeach

        </div>

        <div class="col-4">

            <div class="basket-check">
                <table class="basket-table">
                    <tr>
                        <td>товаров:</td>
                        <td> {{ array_sum($basket) }} </td>
                    </tr>
                    <tr>
                        <td>Стоимость:</td>
                        <td> {{ number_format($price, 0, '.',' ') }} тг </td>
                    </tr>
                    <tr>
                        <td>Доставка:</td>
                        <td> {{ number_format($delivery, 0, '.',' ') }} тг </td>
                    </tr>
                    <tr>
                        <td>НДС:</td>
                        <td> {{ number_format($nds, 2, '.',' ') }} тг </td>
                    </tr>
                    <tr>
                        <td><b> Сумма: </b></td>
                        <td><b> {{ number_format($price + $delivery, 0, '.',' ') }} тг </b></td>
                    </tr>
                </table>
            </div>

        </div>

    </div>
</div>

