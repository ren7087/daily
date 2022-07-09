import * as React from 'react';
import * as GC from '@grapecity/spread-sheets';
import '@grapecity/spread-sheets-resources-ja';
import { SpreadSheets } from '@grapecity/spread-sheets-react';
import ReactDOM from 'react-dom';

// 日本語カルチャを設定します
GC.Spread.Common.CultureManager.culture('ja-jp');

class Excel extends React.Component {
    constructor(props) {
        super(props);
        this.hostStyle = {
            width: '100%',
            height: '600px'
        }
    }
    render() {
        return (
            <div>
                <SpreadSheets hostStyle={this.hostStyle} workbookInitialized={spread=>this.initSpread(spread)}>
                </SpreadSheets>
            </div>
        )
    }
    // 初期化処理
    initSpread(spread) {
    }
}

export default Excel;

if (document.getElementById('excel')) {
    ReactDOM.render(<Excel />, document.getElementById('excel'));
}
