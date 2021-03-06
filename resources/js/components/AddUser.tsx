import { Button } from "@chakra-ui/button"
import { FormLabel } from "@chakra-ui/form-control"
import { AddIcon } from "@chakra-ui/icons"
import { Box, Stack } from "@chakra-ui/layout"
import { Drawer, DrawerBody, DrawerCloseButton, DrawerContent, DrawerFooter, DrawerHeader, DrawerOverlay } from "@chakra-ui/modal"
import { Select } from "@chakra-ui/select"
import { Textarea } from "@chakra-ui/textarea"
import { useDisclosure } from '@chakra-ui/react';

function AddUser() {
    const { isOpen, onOpen, onClose } = useDisclosure()
    // const firstField = React.useRef()

    return (
      <>
        <Button leftIcon={<AddIcon />} colorScheme='teal' onClick={onOpen}>
          Create user
        </Button>
        <Drawer
          isOpen={isOpen}
          placement='right'
        //   initialFocusRef={firstField}
          onClose={onClose}
        >
          <DrawerOverlay />
          <DrawerContent>
            <DrawerCloseButton />
            <DrawerHeader borderBottomWidth='1px'>
              Create a new account
            </DrawerHeader>

            <DrawerBody>
              <Stack spacing='24px'>
                <Box>
                  <FormLabel htmlFor='username'>Name</FormLabel>
                  <Textarea
                    id='username'
                    placeholder='Please enter user name'
                  />
                </Box>

                <Box>
                  <FormLabel htmlFor='owner'>Select Owner</FormLabel>
                  <Select id='owner' defaultValue='segun'>
                    <option value='segun'>Segun Adebayo</option>
                    <option value='kola'>Kola Tioluwani</option>
                  </Select>
                </Box>

                <Box>
                  <FormLabel htmlFor='desc'>Description</FormLabel>
                  <Textarea id='desc' />
                </Box>
              </Stack>
            </DrawerBody>

            <DrawerFooter borderTopWidth='1px'>
              <Button variant='outline' mr={3} onClick={onClose}>
                Cancel
              </Button>
              <Button colorScheme='blue'>Submit</Button>
            </DrawerFooter>
          </DrawerContent>
        </Drawer>
      </>
    )
}


export default AddUser;

