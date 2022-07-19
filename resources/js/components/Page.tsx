import ReactDOM from 'react-dom';
import {useState} from "react";
import Hundsontable from "./Hundsontable";
import Modal from 'react-modal';
import styled from "styled-components";
import {
    Button,
    Stack,
} from '@chakra-ui/react';
import { AddIcon, CalendarIcon} from '@chakra-ui/icons';

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

const customStyles = {
  content: {
    top: '50%',
    left: '50%',
    right: 'auto',
    bottom: 'auto',
    marginRight: '-50%',
    transform: 'translate(-50%, -50%)',
    width: '30%',
    height: 'auto',
    zIndex: 1000,
    positions: "absolute"
  },
}

Modal.setAppElement('#page')

export const Page: React.FC = () => {
  let subtitle: HTMLHeadingElement | null
  const [modalIsOpen, setIsOpen] = useState<boolean>(false)

  function openModal() {
    setIsOpen(true)
  }

  function afterOpenModal() {
    if (subtitle) subtitle.style.color = '#f00'
  }

  function closeModal() {
    setIsOpen(false)
  }

  return (
    <div>
      <Modal
        contentLabel="Example Modal"
        isOpen={modalIsOpen}
        style={customStyles}
        onAfterOpen={afterOpenModal}
        onRequestClose={closeModal}
      >
        <h2 ref={(_subtitle) => (subtitle = _subtitle)}>新規登録</h2><br />
        <form>
          <p>お客様</p><SInput placeholder="ex)本田" /><br />
          <p>場所</p><SInput placeholder="ex)八王子駅" /><br />
          <p>商品</p><SInput placeholder="ex)テレビ" /><br />
          <p>開始時間</p><SInput placeholder="ex)9:00" /><br />
          <p>終了時間</p><SInput placeholder="ex)10:00" /><br />
          <p>行為</p><SInput placeholder="ex)商談" /><br />
          <p>移動手段</p><SInput placeholder="ex)車" /><br />
          <p>交通費</p><SInput placeholder="ex)1000円" /><br />
          <p>内容</p><SInput placeholder="ex)今日はいい天気でした" /><br />
          <p>感想</p><SInput placeholder="ex)今日はいい天気でした" /><br /><br />
        </form>
        <SButton onClick={closeModal}>x</SButton>
        <SButton>登録する</SButton>
      </Modal>
      {/* <div style={{display: "flex"}}> */}
        <Stack direction='row' spacing={10}>
            <Button leftIcon={<AddIcon />} colorScheme='teal' backgroundColor="teal" color="white" size='lg' padding={9} variant='solid' onClick={openModal}>
                新規登録
            </Button>
            <Button rightIcon={<CalendarIcon />} colorScheme='teal' backgroundColor="teal" color="white" size="lg" padding={9} variant='outline'>
                カレンダー
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
