import React from "react";
import ReactDOM from "react-dom";
import { HotTable, HotColumn } from "@handsontable/react";
import "handsontable/dist/handsontable.min.css";
import axios from "axios";
import {useState, useEffect} from "react";

// a renderer component
const ScoreRenderer = (props) => {
  const { value } = props;
  const color = value > 60 ? "#2ECC40" : "#FF4136";
  return (
    <React.Fragment>
      <span style={{ color }}>{value}</span>
    </React.Fragment>
  );
};

// a renderer component
const PromotionRenderer = (props) => {
  const { value } = props;
  if (value) {
    return (
      <React.Fragment>
        <span>&#10004;</span>
      </React.Fragment>
    );
  }
  return (
    <React.Fragment>
      <span>&#10007;</span>
    </React.Fragment>
  );
};

const hotSettings = {
  // you can set `data` to an array of objects
  data: [
    {
      id: 1,
      customer: "吉田",
      location: "八王子駅",
      product: "テレビ",
      start: "2022-06-04 17:00",
      end: "2022-06-04 18:00",
      act: "打ち合わせ",
      transportation: "電車",
      fee: "1000円",
      content: "吾輩わがはいは猫である。名前はまだ無い。どこで生れたかとんと見当けんとうがつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。",
      comment: "吾輩わがはいは猫である。名前はまだ無い。どこで生れたかとんと見当けんとうがつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。",
    },
    {
      id: 2,
      customer: "吉田",
      location: "八王子駅",
      product: "テレビ",
      start: "2022-06-04 17:00",
      end: "2022-06-04 18:00",
      act: "打ち合わせ",
      transportation: "電車",
      fee: "1000円",
      content: "吾輩わがはいは猫である。名前はまだ無い。どこで生れたかとんと見当けんとうがつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。",
      comment: "吾輩わがはいは猫である。名前はまだ無い。どこで生れたかとんと見当けんとうがつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。",
    },
    {
      id: 3,
      customer: "吉田",
      location: "八王子駅",
      product: "テレビ",
      start: "2022-06-04 17:00",
      end: "2022-06-04 18:00",
      act: "打ち合わせ",
      transportation: "電車",
      fee: "1000円",
      content: "吾輩わがはいは猫である。名前はまだ無い。どこで生れたかとんと見当けんとうがつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。",
      comment: "吾輩わがはいは猫である。名前はまだ無い。どこで生れたかとんと見当けんとうがつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。",
    },
    {
      id: 4,
      customer: "吉田",
      location: "八王子駅",
      product: "テレビ",
      start: "2022-06-04 17:00",
      end: "2022-06-04 18:00",
      act: "打ち合わせ",
      transportation: "電車",
      fee: "1000円",
      content: "吾輩わがはいは猫である。名前はまだ無い。どこで生れたかとんと見当けんとうがつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。",
      comment: "吾輩わがはいは猫である。名前はまだ無い。どこで生れたかとんと見当けんとうがつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。",
    },
    {
      id: 5,
      customer: "吉田",
      location: "八王子駅",
      product: "テレビ",
      start: "2022-06-04 17:00",
      end: "2022-06-04 18:00",
      act: "打ち合わせ",
      transportation: "電車",
      fee: "1000円",
      content: "吾輩わがはいは猫である。名前はまだ無い。どこで生れたかとんと見当けんとうがつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。",
      comment: "吾輩わがはいは猫である。名前はまだ無い。どこで生れたかとんと見当けんとうがつかぬ。何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。",
    },
  ],
//   data: [
//     posts.map((post) => {
//         id: {post.id}
//         name: {post.customer}
//         score: {post.end}
//         isPromoted: false
//     }),
//   ],
  licenseKey: "non-commercial-and-evaluation",
  autoRowSize: false,
  autoColumnSize: false,
  colHeaders: ['id', 'お客様', '場所', '商品', '開始時間', '終了時間', '行為', '移動手段', '交通費', '内容', '感想'],
  colWidths: [30, 50, 60, 50, 120, 120, 80, 60, 80, 250, 250],
  minSpareRows: 1,
  manualRowResize: true,
  columnSorting: true,
  ortIndicator: true,
  comments: true,
  mergeCells: true,
  search: true,
};

const Hundsontable = () => {
    const [posts, setPosts] = useState([]);

useEffect (
    ()=>{
        axios.get("/api/getposts").then((res)=>{
            setPosts(res.data.data);
        })
        .catch((e) => {
            console.log(e);
         })
    },
    []
);
  return (
    <HotTable settings={hotSettings}>
      {/* use the `data` prop to reference the column data */}
      <HotColumn data="id" />
      <HotColumn data="customer" />
      <HotColumn data="location">
      </HotColumn>
      <HotColumn data="product">
      </HotColumn>
      <HotColumn data="start">
      <ScoreRenderer hot-renderer />
      </HotColumn>
      <HotColumn data="end">
      <ScoreRenderer hot-renderer />
      </HotColumn>
      <HotColumn data="act"></HotColumn>
      <HotColumn data="transportation"></HotColumn>
      <HotColumn data="fee"></HotColumn>
      <HotColumn data="content"></HotColumn>
      <HotColumn data="comment"></HotColumn>
    </HotTable>
  );
};

export default Hundsontable;


if (document.getElementById('hundsontable')) {
    ReactDOM.render(<Hundsontable />, document.getElementById('hundsontable'));
}
