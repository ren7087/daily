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

const SButton = styled.button`
    margin: 7px;
    background-color: red;
    color: white;
    width: 80px;
    height: 30px;
`

const SInput = styled.input`
    border: 1px solid;
    border-radius: 8px;
`

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

export const Page: React.FC = () => {
  let subtitle: HTMLHeadingElement | null
  const [show, setShow] = useState(false);
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
    <div>
      {/* <div style={{display: "flex"}}> */}
        <Stack direction='row' spacing={10}>
            <Button rightIcon={<AddIcon />} colorScheme='teal' backgroundColor="teal" color="white" size="lg" padding={9} variant='outline' onClick={() => setShow(true)}>
                新規登録
            </Button>
            <Modal show={show} setShow={setShow} />
            <Button rightIcon={<AddIcon />} colorScheme='teal' backgroundColor="teal" color="white" size="lg" padding={9} variant='outline'>
            <Link color="white" href='/post/react-input' textDecoration="none">新規登録</Link>
            </Button>
            <Button rightIcon={<CalendarIcon />} colorScheme='teal' backgroundColor="teal" color="white" size="lg" padding={9} variant='outline'>
            <Link color="white" href='/post/react-calendar' textDecoration="none">カレンダー</Link>
            </Button>
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
