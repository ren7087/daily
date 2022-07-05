import ReactDOM from 'react-dom';
import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin, {DateClickArg} from '@fullcalendar/interaction';
import allLocals from "@fullcalendar/core/locales-all";
import { useCallback } from 'react';

const thisMonth = () => {
    const today = new Date();
    return `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(
      2,
      "0"
    )}`;
};

function App() {
    const handleDateClick = useCallback((arg: DateClickArg) => {
        alert(arg.dateStr);
    }, []);
    const todayStr = new Date().toISOString().replace(/T.*$/, "");
    return (
        <div>
        <FullCalendar
            initialView="dayGridMonth"
            locales={allLocals}
            locale="ja"
            plugins={[dayGridPlugin, timeGridPlugin, interactionPlugin]}
            headerToolbar={{
                start: "prev,next today",
                center: "title",
                end: "dayGridMonth,timeGridWeek,timeGridDay",
            }}
            events={[
                { title: "event 1", date: `${thisMonth()}-01` },
                { title: "event 2", date: `${thisMonth()}-02` },
                {
                    title: "All-day event",
                    start: todayStr,
                },
                {
                    title: "Timed event",
                    start: todayStr + "T12:00:00",  // 時刻はTで結ぶ
                },
            ]}
            dateClick = {handleDateClick}
            selectable={true}
            editable={true}
        />
        </div>
    );
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
