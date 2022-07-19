import ReactDOM from 'react-dom';
import Hundsontable from "./Hundsontable";
import axios from "axios";
import {useState, useEffect} from "react";
import styled from "styled-components";
import {
    Button,
    Stack,
    Link
} from '@chakra-ui/react';
import { AddIcon, CalendarIcon} from '@chakra-ui/icons';
import { Input } from "./Input"
import App from './App';

const SOverlay = styled.div`
    position: fixed;
    left: 0;
    top:0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index:5;
`
const SContent = styled.div`
    z-index: 10;
    width: 50%;
    padding: 1em;
    background: #fff;
`

function Modal(props){
    const {show, setShow} = props;
    if (props.show) {
        return (
            <SOverlay onClick={() => setShow(false)}>
                <SContent onClick={(e) => e.stopPropagation()}>
                    <Input />
                </SContent>
            </SOverlay>
        );
    } else {
        return null;
    }
};

function ModalCalendar(props){
    const {showCalendar, setShowCalendar} = props;
    if (props.showCalendar) {
        return (
            <SOverlay onClick={() => setShowCalendar(false)}>
                <SContent onClick={(e) => e.stopPropagation()}>
                    <App />
                </SContent>
            </SOverlay>
        );
    } else {
        return null;
    }
};

export const Page: React.FC = () => {
    let subtitle: HTMLHeadingElement | null
    const [show, setShow] = useState(false);
    const [showCalendar, setShowCalendar] = useState(false);

    return (
        <div>
        {/* <div style={{display: "flex"}}> */}
            <Stack direction='row' spacing={10}>
                <Button rightIcon={<AddIcon />} colorScheme='teal' backgroundColor="teal" color="white" size="lg" padding={9} variant='outline' onClick={() => setShow(true)}>
                    新規登録
                </Button>
                <Modal show={show} setShow={setShow} />
                <Button rightIcon={<CalendarIcon />} colorScheme='teal' backgroundColor="teal" color="white" size="lg" padding={9} variant='outline' onClick={() => setShowCalendar(true)}>
                    カレンダー
                </Button>
                <ModalCalendar showCalendar={showCalendar} setShowCalendar={setShowCalendar} />
            </Stack><br />

            <Hundsontable/>
        {/* </div><br /> */}
        <br />
        </div>
    )
}

if (document.getElementById('page')) {
    ReactDOM.render(<Page />, document.getElementById('page'));
}
