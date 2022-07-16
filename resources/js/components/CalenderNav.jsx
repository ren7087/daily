import { useNavigate } from "react-router-dom"

export const CalendarNav = () => {
    const navigate = useNavigate()
    return (
        <div>
            <button onClick={() => navigate('/componentb')}>画面遷移します！</button>
        </div>
    );
};

export default CalendarNav;
