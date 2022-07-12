import styled from "styled-components";

const SCard = styled.div`
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    backgroundColor: rgba(0,0,0,0.5);
    display: flex;
    alignItems: center;
    justifyContent: center;
`

const SModal = styled.div`
    background: white;
    padding: 10px;
    borderRadius: 3px;
`

export const Modal = (props) => {
    const closeModal = () => {
        props.setShowModal(false);
    };
    return (
        <>
            {props.showFlag ? (
                <SCard>
                    <SModal>
                        <p>モーダルです</p>
                        <button onClick={closeModal}>Close</button>
                    </SModal>
                </SCard>
            ) : (
                <></>
            )}
        </>
    );
};

