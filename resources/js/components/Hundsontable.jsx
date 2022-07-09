import React, { Component } from 'react';
import { HotTable } from '@handsontable/react';
import ReactDOM from 'react-dom';
import {data} from "../../../public/nippou.json";

class Hundsontable extends React.Component {
  constructor(props) {
    super(props);
    this.data = [
      ['java', 'c', 'python', 'go', 'cobol', 'c#'],
      [9, 10, 11, 12, 7],
      [10, 20, 11, 14, 20, 'test'],
      [11, 30, 15, 12, 17],
      [12, 30, 15, 12, 7],
      [12, 30, 15, 12, 7],
      [12, 30, 15, 12, 7],
      [12, 30, 15, 12, 7],
      [{data}],
    ];
  }

  render() {
    return (<HotTable
        data={this.data}
        colHeaders={true}
        rowHeaders={true}
        width="600"
        height="300"
        licenseKey='non-commercial-and-evaluation'
    />);
  }
}

export default Hundsontable;


if (document.getElementById('hundsontable')) {
    ReactDOM.render(<Hundsontable />, document.getElementById('hundsontable'));
}
