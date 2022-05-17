<x-app>
    <div style="text-align:center; margin-top:100px">
        <h2>担当者名 : 田中太郎</h2>
        <p>表示している日付 : {{ $target }}</p><br>
        <div class="table">
        <table>
                <thead>
                <tr>
                    <th></th>
                    <th>お客様</th>
                    <th>商品</th>
                    <th>行為</th>
                    <th>内容</th>
                    <th>感想</th>
                    <th></th>
                </tr>
                </thead>
            <tbody>
                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '7:00'&& $daily['start'] < '7:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '7:00' || $daily['end'] > '7:00') && !($daily['start'] >= '7:00'&& $daily['start'] < '7:00'))
                            <td>7:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>8:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '8:00'&& $daily['start'] < '9:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '8:00' || $daily['end'] > '8:00') && !($daily['start'] >= '8:00'&& $daily['start'] < '9:00'))
                            <td>8:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>9:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '9:00' && $daily['start'] < '10:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '9:00' || $daily['end'] > '9:00') && !($daily['start'] >= '9:00' && $daily['start'] < '10:00'))
                            <td>9:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>10:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '10:00' && $daily['start'] < '11:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '10:00' || $daily['end'] > '10:00') && !($daily['start'] >= '10:00' && $daily['start'] < '11:00'))
                            <td>10:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>11:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '11:00' && $daily['start'] < '12:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '11:00' || $daily['end'] > '11:00') && !($daily['start'] >= '11:00' && $daily['start'] < '12:00'))
                            <td>11:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>12:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '12:00' && $daily['start'] < '13:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '12:00' || $daily['end'] > '12:00') && !($daily['start'] >= '12:00' && $daily['start'] < '13:00'))
                            <td>12:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>13:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '13:00' && $daily['start'] < '14:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '13:00' || $daily['end'] > '13:00') && !($daily['start'] >= '13:00' && $daily['start'] < '14:00'))
                            <td>13:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>14:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '14:00' && $daily['start'] < '15:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '14:00' || $daily['end'] > '14:00') && !($daily['start'] >= '14:00' && $daily['start'] < '15:00'))
                            <td>14:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>15:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '15:00' && $daily['start'] < '16:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '15:00' || $daily['end'] > '15:00') && !($daily['start'] >= '15:00' && $daily['start'] < '16:00'))
                            <td>15:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>16:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '16:00' && $daily['start'] < '17:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if($daily['start'] < '16:00' || $daily['end'] > '16:00')
                            <td>16:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>17:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '17:00' && $daily['start'] < '18:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '17:00' || $daily['end'] > '17:00') && !($daily['start'] >= '17:00' && $daily['start'] < '18:00'))
                            <td>17:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>18:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '18:00' && $daily['start'] < '19:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '18:00' || $daily['end'] > '18:00') && !($daily['start'] >= '18:00' && $daily['start'] < '19:00'))
                            <td>18:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>19:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '19:00' && $daily['start'] < '20:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '19:00' || $daily['end'] > '19:00') && !($daily['start'] >= '19:00' && $daily['start'] < '20:00'))
                            <td>19:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>20:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '20:00' && $daily['start'] < '21:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '20:00' || $daily['end'] > '20:00') && !($daily['start'] >= '20:00' && $daily['start'] < '21:00'))
                            <td>20:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>21:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '21:00' && $daily['start'] < '22:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '21:00' || $daily['end'] < '21:00') && !($daily['start'] >= '21:00' && $daily['start'] < '22:00'))
                            <td>21:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>22:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '22:00' && $daily['start'] < '23:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '22:00' || $daily['end'] > '22:00') && !($daily['start'] >= '22:00' && $daily['start'] < '23:00'))
                            <td>22:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>23:00</td>
                        @endif
                    @endif
                </tr>

                <tr>
                    @foreach ($match as $daily)
                    @if(isset($daily))
                        @if($daily['start'] >= '23:00' && $daily['start'] < '24:00')
                            <td>{{ $daily['start'] }}</td>
                            <td>{{ $daily['customer'] }}</td>
                            <td>{{ $daily['product'] }}</td>
                            <td>{{ $daily['action'] }}</td>
                            <td>{{ $daily['content'] }}</td>
                            <td>{{ $daily['comment'] }}</td>
                            <td>{{ $daily['end'] }}</td>
                        @endif
                    @endif
                    @endforeach
                </tr>
                <tr>
                    @if(isset($daily))
                        @if(($daily['start'] < '23:00' || $daily['end'] > '23:00') && !($daily['start'] >= '23:00' && $daily['start'] < '24:00'))
                            <td>23:00</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>24:00</td>
                        @endif
                    @endif
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</x-app>
