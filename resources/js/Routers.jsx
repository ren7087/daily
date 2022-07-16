import { BrowserRouter, Routes, Route } from "react-router-dom";
import CalendarNav from "./components/CalendarNav";

export const Routers = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<CalendarNav/>}/>
            </Routes>
        </BrowserRouter>
    );
};

export default Routers;
