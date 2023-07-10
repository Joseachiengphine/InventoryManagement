<?php

namespace App\Filament\Resources;

use Wizard\Step;
use Filament\Forms;
use Filament\Tables;
use App\Models\Customer;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Forms\Components\TextColumn;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use App\Filament\Resources\CustomerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CustomerResource\RelationManagers;
use Ysfkaya\FilamentPhoneInput\PhoneInput;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'SHOP';

    public static function form(Form $form): Form
    {
        return $form
    ->schema([
            Card::make()
            ->schema([
            Fieldset::make('Personal Details')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('Customer/Company Name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('email')
                                ->email()
                                ->required()
                                ->maxLength(255),
                            PhoneInput::make('phoneNumber')
                                ->autoPlaceholder('polite')
                                ->initialCountry('ke')
                                ->required()

                        ])
                ->columns(2),
                Fieldset::make('Address Details')
                ->schema([
        Forms\Components\TextInput::make('country')
        ->required()
        ->maxLength(255),
        Forms\Components\TextInput::make('address')
        ->required()
        ->maxLength(255),
                ]),
                Fieldset::make('Payment Details')
                     ->schema([
                        Select::make('paymentmethod')
                        ->label('Payment Method')
                        ->options([
                        'mpesa' => 'MPESA',
                        'bank' => 'BANK',
                        'cheque' => 'CHEQUE',
                        ]),
                        Forms\Components\TextInput::make('recievables')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\MarkdownEditor::make('description')
                        ->required()
                        ->maxLength(65535)
                            ->columnSpan('full'),
                    ])
                ]),
                    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('email')
                ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('phoneNumber')
                ,
                Tables\Columns\TextColumn::make('description')
                ->searchable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('recievables')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                ->searchable()
                ->toggleable()
                ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->date()
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
