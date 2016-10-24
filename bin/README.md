# Class Generator

Class Generator is an interactive binary used to generate `graze/unicontroller-client`. It does not form any part of the client and can be ignored for normal usage.

If additional commands are added to the specification, the binary can be used to update the client in order to support them.

The protocol is designed in such away that the format of an item within a design, matches the command that creates it. This allows a Parser and Serialiser to be created from a single definition.

### Generating Classes
- Copy a command/design item definition from the Unicontroller Interface Protocol document. For example:

 `[SOH]PictureItem=AnchorPoint,XPos,YPos,Width,Heigth,Orion,[STX]Description[ETX],Maintain,[STX]PictureName[ETX],[STX]PrinterReferenceName[ETX],UsePixelSize,PictureData,StoreInternally,PhantomField[ETB]`
- Run `bin/classGenerator -d [DEFINITION]`, supplying the definition as an argument
- You will be prompted for additional information if required
- `Entity`, `Parser` and `Serialiser` classes will be written
