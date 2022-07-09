import React from "react";
import ExcelJS from "exceljs";
import encoding from "encoding-japanese";
import ReactDOM from 'react-dom';

export const ExcelJs: React.FC = () => {
  const handlerClickDownloadButton = async (
    e: React.MouseEvent<HTMLButtonElement, MouseEvent>,
    format: "xlsx" | "csv",
    charcode?: "UTF8" | "SJIS"
  ) => {
    e.preventDefault();

    const workbook = new ExcelJS.Workbook();
    workbook.addWorksheet("sheet1");
    const worksheet = workbook.getWorksheet("sheet1");

    worksheet.columns = [
      { header: "ID", key: "id" },
      { header: "作成日時", key: "createdAt" },
      { header: "名前", key: "name" }
    ];

    worksheet.addRows([
      {
        id: "f001",
        createdAt: 1629902208,
        name: "りんご"
      },
      {
        id: "f002",
        createdAt: 1629902245,
        name: "ぶどう"
      },
      {
        id: "f003",
        createdAt: 1629902265,
        name: "ばなな"
      }
    ]);

    const uint8Array =
      format === "xlsx"
        ? await workbook.xlsx.writeBuffer()
        : charcode === "UTF8"
        ? await workbook.csv.writeBuffer()
        : new Uint8Array(
            encoding.convert(await workbook.csv.writeBuffer(), {
              from: "UTF8",
              to: "SJIS"
            })
          );
    const blob = new Blob([uint8Array], {
      type: "application/octet-binary"
    });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = "sampleData." + format;
    a.click();
    a.remove();
  };
  return (
    <>
      <header>
        <h1>データ出力</h1>
        <h2>下記のどれかをクリックすると出力されます</h2>
      </header>
      <>
        <button onClick={(e) => handlerClickDownloadButton(e, "xlsx")}>
          Excel形式
        </button>
        <button onClick={(e) => handlerClickDownloadButton(e, "csv", "UTF8")}>
          CSV形式(UTF8)
        </button>
        <button onClick={(e) => handlerClickDownloadButton(e, "csv", "SJIS")}>
          CSV形式(SJIS)
        </button>
      </>
    </>
  );
};


export default ExcelJs;


if (document.getElementById('excelJs')) {
    ReactDOM.render(<ExcelJs />, document.getElementById('excelJs'));
}
