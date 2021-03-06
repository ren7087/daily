import { useState } from 'react';
import ReactDOM from 'react-dom';
import styled from "styled-components";
import axios from 'axios';

const SCard = styled.div`
    margin: auto;
    box-shadow: 0 4px 15px rgba(0,0,0,.2);
    padding: 90px;
    background-color: #fff;
    border-radius: 30px;
    width: 65%;
    height: 900px;
    overflow: scroll;
`;

const SForm = styled.form`
    display: grid;
    grid-template: auto / 100%;
    gap: 30px;
    border-radius: 8px;
    margin: auto;
`;

const SFormHead = styled.div`
  margin-bottom: 5px;
  font-weight: bold;
`;

const SFormInput = styled.input`
  border: none;
  width: 100%;
  background-color: #f1f1f1;
  padding: 10px;
  border-radius: 4px;
  transition: 0.3s;

  &:focus {
    outline: none;
    background: #e7e7e7;
    transition: 0.3s;
  }
`;

const SFormTextArea = styled.textarea`
  border: none;
  width: 100%;
  background-color: #f1f1f1;
  padding: 10px;
  border-radius: 4px;
  height: 10em;
  transition: 0.3s;

  &:focus {
    outline: none;
    background: #e7e7e7;
    transition: 0.3s;
  }
`;

const SButton = styled.button`
  border: none;
  background-color: #555;
  color: #fff;
  padding: 10px;
  min-height: 40px;
  display: flex;
  width: 150px;
  text-align: center;
  transition: 0.3s;
  border-radius: 4px;
  margin: auto;
  justify-content: center;
  align-items: center;

  &:hover {
    background-color: #999;
    cursor: pointer;
  }
`;

export const Input = () => {
    const [customer, setCustomer] = useState("");
    const [location, setLocation] = useState("");
    const [product, setProduct] = useState("");
    const [start, setStart] = useState("");
    const [end, setEnd] = useState("");
    const [fee, setFee] = useState("");
    const [action, setAction] = useState("");
    const [transportation, setTransportation] = useState("");
    const [content, setContent] = useState("");
    const [comment, setComment] = useState("");

    const onChangeCustomer = (event) => {
        setCustomer(event.target.value);
    };
    const onChangeLocation = (event) => {
        setLocation(event.target.value);
    };
    const onChangeProduct = (event) => {
        setProduct(event.target.value);
    };
    const onChangeStart = (event) => {
        setStart(event.target.value);
    };
    const onChangeEnd = (event) => {
        setEnd(event.target.value);
    };
    const onChangeAction = (event) => {
        setAction(event.target.value);
    };
    const onChangeTransportation = (event) => {
        setTransportation (event.target.value);
    };
    const onChangeFee = (event) => {
        setFee(event.target.value);
    };
    const onChangeContent = (event) => {
        setContent(event.target.value);
    };
    const onChangeComment = (event) => {
        setComment(event.target.value);
    };
    const onSubmit = (event) => {
        event.preventDefault();
        axios
        .post("/post/store2", {
            customer,
            location,
            product,
            start,
            end,
            action,
            transportation,
            fee,
            content,
            comment
        })
        .then(r => alert("????????????!"))
        .catch(r => alert("??????!"))
    }

    return (
        <SCard>
        <h2 style={{textAlign: "center", paddingBottom: "30px", fontWeight: "bold"}}>????????????</h2>
        <SForm onSubmit={onSubmit}>
            <div>
            <SFormHead>?????????*</SFormHead>
            <SFormInput type={"text"} value={customer} required onChange={onChangeCustomer} />
            </div>
            <div>
            <SFormHead>??????*</SFormHead>
            <SFormInput type={"text"} value={location} placeholder="????????????" onChange={onChangeLocation} />
            </div>
            <div>
            <SFormHead>??????*</SFormHead>
            <SFormInput type={"text"} value={product} onChange={onChangeProduct} />
            </div>
            <div>
            <SFormHead>????????????*</SFormHead>
            <SFormInput type={"time"} value={start} onChange={onChangeStart} />
            </div>
            <div>
            <SFormHead>????????????*</SFormHead>
            <SFormInput type={"time"} value={end} onChange={onChangeEnd} />
            </div>

            <div>
            <SFormHead>??????*</SFormHead>
            <SFormInput type={"text"} value={action} placeholder="???) ??????????????????????????????????????????????????????" onChange={onChangeAction} />
            </div>
            <div>
            <SFormHead>????????????*</SFormHead>
            <SFormInput type={"text"} value={transportation} placeholder="???) ????????????????????????????????????" onChange={onChangeTransportation} />
            </div>

            <div>
            <SFormHead>?????????*</SFormHead>
            <SFormInput type={"text"} value={fee} placeholder="1000???" onChange={onChangeFee} />
            </div>
            <div>
            <SFormHead>??????*</SFormHead>
            <SFormTextArea
                required
                placeholder="??????????????????????????????"
                onChange={onChangeContent}
            ></SFormTextArea>
            </div>
            <div>
            <SFormHead>??????*</SFormHead>
            <SFormTextArea
                required
                placeholder="??????????????????????????????"
                onChange={onChangeComment}
            ></SFormTextArea>
            </div>
            <SButton type="submit">??????</SButton>
        </SForm>
        </SCard>
    )
}

if (document.getElementById('input')) {
    ReactDOM.render(<Input />, document.getElementById('input'));
}
