import GC from '@grapecity/spread-sheets'
import { Column, SpreadSheets, Worksheet } from '@grapecity/spread-sheets-react'
import '@grapecity/spread-sheets-resources-ja'
import { useState } from "react"
import ReactDOM from 'react-dom';

export const Excel = () => {
    const [isLoading, setIsLoading] = useState(true)

    const initSpread = (spread: GC.Spread.Sheets.Workbook) => {
        return new Promise<void>(resolve => {
            setTimeout(() => {
                // 3秒の重い処理を想定
                resolve()
            }, 3000)
        })
    }

    return (
        <>
            {isLoading ? <h1>Loading....</h1> : <></>}
            <div style={{ visibility: isLoading ? 'hidden' : 'visible' }}>
                <SpreadSheets workbookInitialized={spread => {
                    initSpread(spread).then(() => setIsLoading(false))
                }}>
                    <Worksheet >
                        <Column />
                    </Worksheet>
                </SpreadSheets>
            </div>
        </>
    )
}

if (document.getElementById('excel')) {
    ReactDOM.render(<Excel />, document.getElementById('excel'));
}
